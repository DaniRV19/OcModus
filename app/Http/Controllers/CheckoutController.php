<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use App\Models\Product;
use App\Models\Order;
use PDF;

class CheckoutController extends Controller
{
    /**
     * Muestra la vista de checkout con el resumen del carrito.
     */
    public function index()
    {
        $instance = 'cart_' . auth()->id();
        $items = Cart::instance($instance)->content();
        $rawSubtotal = (float) Cart::instance($instance)->subtotal(2, '.', '');
        $shipping = $rawSubtotal * 0.075; // 7.5% del subtotal
        $vatRate = 0.21;
        $vat = $rawSubtotal * $vatRate;
        $total = $rawSubtotal + $shipping + $vat;

        $voucher = session('appliedVoucher');
        $discount = 0;
        if ($voucher) {
            // Cupón con descuento fijo (valor en "amount")
            $discount = $voucher->amount;
            $total = $total - $discount;
            if ($total < 0) {
                $total = 0;
            }
        }

        return view('user.shopping_cart.checkout', compact(
            'items', 'rawSubtotal', 'shipping', 'vatRate', 'vat', 'total', 'voucher', 'discount'
        ));
    }

    /**
     * Procesa el checkout: valida stock, crea la orden, actualiza inventario, marca cupón, guarda datos y vacía el carrito.
     */
    public function process(Request $request)
    {
        $instance = 'cart_' . auth()->id();
        $items = Cart::instance($instance)->content();
        $rawSubtotal = (float) Cart::instance($instance)->subtotal(2, '.', '');
        $shipping = $rawSubtotal * 0.075; // 7.5% del subtotal
        $vatRate = 0.21; // 21% IVA
        $vat = $rawSubtotal * $vatRate;
        $total = $rawSubtotal + $shipping + $vat;

        // Si se aplicó cupón, réstalo al total
        $voucher = session('appliedVoucher');
        $discount = 0;
        if ($voucher) {
            $discount = $voucher->amount;
            $total = $total - $discount;
            if ($total < 0) {
                $total = 0;
            }
        }

        // Actualiza el stock de cada producto
        foreach ($items as $item) {
            $product = \App\Models\Product::find($item->id);
            if ($product) {
                // Asegurarse de que haya stock suficiente
                if ($product->stock >= $item->qty) {
                    $product->stock -= $item->qty;
                    $product->save();
                } else {
                    return redirect()->back()->with('error', 'Stock insuficiente para el producto: ' . $product->name);
                }
            }
        }

        // Crear la orden SIN almacenar dirección, ya que la tabla orders no tiene dichas columnas
        $order = Order::create([
            'user_id'        => auth()->id(),
            'total_amount'   => $total,
            'status'         => ['pending', 'delivered', 'shipped'][array_rand(['pending', 'delivered', 'shipped'])],
            'payment_method' => 'transferencia',
            'payment_status' => 'pending',
            'shipping_method'=> 'standard',
            'shipping_cost'  => $shipping,
            'tracking_number'=> 'N/A',
        ]);

        // Crear los detalles de la orden
        foreach ($items as $item) {
            $order->details()->create([
                'product_id' => $item->id,
                'quantity'   => $item->qty,
                'unit_price' => $item->price,
                'subtotal'   => $item->subtotal,
            ]);
        }

        // Si se aplicó un cupón, marcarlo como usado (sin vincularlo a la orden)
        if ($voucher) {
            $voucher->is_used = true;
            $voucher->save();
            session()->forget('appliedVoucher');
        }

        // Guardar los datos de la orden en la sesión para generar la factura
        session()->put('orderData', [
            'order'       => $order->toArray(),
            'items'       => $order->details->toArray(),
            'rawSubtotal' => $rawSubtotal,
            'shipping'    => $shipping,
            'vatRate'     => $vatRate,
            'vat'         => $vat,
            'total'       => $total,
            'discount'    => $discount,
        ]);

        // Vaciar el carrito exclusivo del usuario
        Cart::instance($instance)->destroy();

        return redirect()->route('checkout.confirmation')->with('success', 'Compra completada exitosamente.');
    }

    /**
     * Muestra la página de confirmación de la orden.
     */
    public function confirmation()
    {
        return view('user.shopping_cart.confirmation');
    }

    /**
     * Genera la factura en PDF utilizando los datos de la orden almacenados en la sesión.
     */
    public function invoice()
    {
        $orderData = session('orderData');

        if (!$orderData) {
            return redirect()->back()->with('error', 'No se encontraron datos de compra.');
        }

        // Obtener datos del usuario autenticado para la factura
        $user = auth()->user();
        // Obtener la dirección predeterminada del usuario (suponiendo que la relación addresses() está definida)
        $address = $user->addresses()->where('is_default', true)->first();
        $addressString = 'Dirección no especificada';
        if ($address) {
            $addressString = $address->street . ', ' . $address->city . ', ' .
                             $address->state . ', ' . $address->country . ' ' . $address->postal_code;
        }

        $clientData = [
            'name'    => $user->first_name . ' ' . $user->last_name,
            'address' => $addressString,
            'phone'   => $user->phone,
        ];

        $companyData = [
            'name'    => 'OC MODUS',
            'address' => 'Nervión, Sevilla',
            'phone'   => '693495858'
        ];

        return PDF::loadView('user.shopping_cart.invoice', [
            'clientData'  => $clientData,
            'companyData' => $companyData,
            'items'       => $orderData['items'] ?? [],
            'rawSubtotal' => $orderData['rawSubtotal'] ?? 0,
            'shipping'    => $orderData['shipping'] ?? 0,
            'vatRate'     => $orderData['vatRate'] ?? 0,
            'vat'         => $orderData['vat'] ?? 0,
            'total'       => $orderData['total'] ?? 0,
        ])->stream('factura.pdf');
    }
}
