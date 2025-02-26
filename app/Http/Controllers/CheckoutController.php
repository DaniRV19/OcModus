<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use App\Models\Product;
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
        $shipping = $rawSubtotal * 0.075; // Costo de envío fijo
        $vatRate = 0.21; // IVA del 21%
        $vat = $rawSubtotal * $vatRate;
        $total = $rawSubtotal + $shipping + $vat;

        // Ahora la vista se llama checkout.blade.php
        return view('user.shopping_cart.checkout', compact('items', 'rawSubtotal', 'shipping', 'vatRate', 'vat', 'total'));
    }

    /**
     * Procesa el checkout: valida stock, simula el pago, actualiza stock y vacía el carrito.
     */
    public function process(Request $request)
    {
        $items = Cart::instance('cart')->content();
        $rawSubtotal = (float) Cart::instance('cart')->subtotal(2, '.', '');
        $shipping = $rawSubtotal * 0.075; // 7.5% del subtotal
        $vatRate = 0.21; // 21% IVA
        $vat = $rawSubtotal * $vatRate;
        $total = $rawSubtotal + $shipping + $vat;

        // Aquí puedes validar el stock, actualizar el inventario, etc.

        // Almacena los datos de la compra en la sesión antes de vaciar el carrito
        session()->put('orderData', [
            'items' => $items->toArray(), // Convertimos a array para almacenar correctamente
            'rawSubtotal' => $rawSubtotal,
            'shipping' => $shipping,
            'vatRate' => $vatRate,
            'vat' => $vat,
            'total' => $total,
        ]);

        // Vaciar el carrito
        Cart::instance('cart')->destroy();

        // Redirige a la página de confirmación
        return redirect()->route('checkout.confirmation')->with('success', 'Pago realizado con éxito. ¡Gracias por tu compra!');
    }


    /**
     * Muestra la página de confirmación de la orden.
     */
    public function confirmation()
    {
        return view('user.shopping_cart.confirmation');
    }
    public function invoice()
    {
        $orderData = session('orderData');

        if (!$orderData) {
            return redirect()->back()->with('error', 'No se encontraron datos de compra.');
        }

        // Obtener los datos del usuario autenticado para la factura
        $user = auth()->user();
        $clientData = [
            'name' => $user->first_name . ' ' . $user->last_name,
            'address' => 'Dirección no especificada', // Reemplaza con un campo real si lo tienes
            'phone' => $user->phone,
        ];

        $companyData = [
            'name' => 'OC MODUS',
            'address' => 'Nervión, Sevilla',
            'phone' => '12439856'
        ];

        // Combina los datos de la compra con los datos de usuario y empresa
        $data = array_merge($orderData, [
            'clientData' => $clientData,
            'companyData' => $companyData,
        ]);

        $pdf = \PDF::loadView('user.shopping_cart.invoice', $data);

        return $pdf->stream('factura.pdf');
    }


}
