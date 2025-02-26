<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use App\Models\Product;

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

        // Validar stock
        foreach ($items as $item) {
            $product = Product::find($item->id);
            if (!$product || $product->stock < $item->qty) {
                return redirect()->back()->with('error', 'El producto "' . ($product->name ?? $item->name) . '" no tiene stock suficiente.');
            }
        }

        // Simulación del proceso de pago (puedes integrar un gateway real)
        // Asumimos que el pago fue exitoso

        // Actualizar el stock de cada producto
        foreach ($items as $item) {
            $product = Product::find($item->id);
            $product->stock = $product->stock - $item->qty;
            $product->save();
        }

        // Opcional: Registrar la orden en la base de datos

        // Vaciar el carrito
        Cart::instance('cart')->destroy();

        // Redirigir a la confirmación
        return redirect()->route('checkout.confirmation')->with('success', 'Pago realizado con éxito. ¡Gracias por tu compra!');
    }

    /**
     * Muestra la página de confirmación de la orden.
     */
    public function confirmation()
    {
        return view('user.shopping_cart.confirmation');
    }
}
