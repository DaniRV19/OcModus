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
        $items = Cart::instance('cart')->content();
        $rawSubtotal = (float) Cart::instance('cart')->subtotal(2, '.', '');
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
            if($total < 0) {
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
        $items = Cart::instance('cart')->content();
        $rawSubtotal = (float) Cart::instance('cart')->subtotal(2, '.', '');
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
            // Asegurarse de que haya stock suficiente (opcional, si ya lo validaste antes)
            if ($product->stock >= $item->qty) {
                $product->stock -= $item->qty;
                $product->save();
            } else {
                return redirect()->back()->with('error', 'Stock insuficiente para el producto: ' . $product->name);
            }
        }
    }

        // Crear la orden
        $order = Order::create([
            'user_id'        => auth()->id(),
            'total_amount'   => $total,
            'status'         => 'pending',       // Valor permitido: 'pending'
            'payment_method' => 'transferencia', // Valor permitido: 'transferencia', 'tarjeta' o 'paypal'
            'payment_status' => 'pending',       // Valor permitido: 'pending', 'completed' o 'failed'
            'shipping_method'=> 'standard',      // Valor permitido: 'standard' o 'express'
            'shipping_cost'  => $shipping,
            'tracking_number'=> 'N/A',
        ]);
        
        

        // Crear los detalles de la orden (suponiendo que la relación details() en Order existe y usa OrderDetail)
        foreach ($items as $item) {
            $order->details()->create([
                'product_id' => $item->id,
                'quantity'   => $item->qty,
                'unit_price' => $item->price,
                'subtotal'   => $item->subtotal,
            ]);
            
        }

        // Si se aplicó un cupón, vincularlo a la orden y marcarlo como usado
        if ($voucher) {
            $voucher->is_used = true;
            $voucher->save();
            session()->forget('appliedVoucher');
        }

        // Guardar los datos de la orden en la sesión para generar la factura
        session()->put('orderData', [
            // Convierte el objeto Order a array 
            'order'       => $order->toArray(),
            'items'       => $order->details->toArray(),
            'rawSubtotal' => $rawSubtotal,
            'shipping'    => $shipping,
            'vatRate'     => $vatRate,
            'vat'         => $vat,
            'total'       => $total,
            'discount'    => $discount,
        ]);

        // Vaciar el carrito
        Cart::instance('cart')->destroy();

        // Redirigir a la página de confirmación
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
    $clientData = [
        'name'    => $user->first_name . ' ' . $user->last_name,
        'address' => 'Dirección no especificada', 
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
