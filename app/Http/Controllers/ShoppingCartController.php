<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use App\Models\Product;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $items = Cart::instance('cart_' . auth()->id())->content();
        return view('user.shopping_cart.index', compact('items'));
    }

    public function add(Request $request)
    {
        // Obtener el producto mediante el ID recibido
        $product = Product::findOrFail($request->input('product_id'));

        // Calcular el precio final aplicando descuento de la categoría (si está activo)
        $finalPrice = $product->price;
        if ($product->category && $product->category->discount_active) {
            $finalPrice = $product->price - ($product->price * ($product->category->discount / 100));
        }

        // Agregar el producto al carrito utilizando la clave 'qty' y la instancia exclusiva para el usuario
        Cart::instance('cart_' . auth()->id())->add([
            'id'         => $product->id,
            'name'       => $product->name,
            'price'      => $finalPrice,
            'qty'        => 1, // Usamos 'qty' y no 'quantity'
            'attributes' => [
                'image' => $product->images()->first()->url ?? 'default-image.jpg'
            ]
        ]);

        return redirect()->back()->with('success', 'Producto añadido al carrito');
    }

    public function update(Request $request, $rowId)
    {
        $newQty = $request->input('quantity');
        // Actualizar usando la instancia exclusiva para el usuario
        Cart::instance('cart_' . auth()->id())->update($rowId, $newQty);

        return redirect()->back()->with('success', 'Cantidad actualizada');
    }

    public function remove($rowId)
    {
        Cart::instance('cart_' . auth()->id())->remove($rowId);
        return redirect()->back()->with('success', 'Producto removido del carrito');
    }

    public function applyCoupon(Request $request)
    {
        $code = $request->input('coupon_code');
        $user = auth()->user();

        $voucher = \App\Models\Voucher::where('code', $code)
            ->where('user_id', $user->id)
            ->where('expiry_date', '>=', now())
            ->where('is_used', false)
            ->first();

        if (!$voucher) {
            return redirect()->back()->with('error', 'Cupón inválido, expirado o ya usado.');
        }

        // Guarda el cupón en la sesión
        session()->put('appliedVoucher', $voucher);

        return redirect()->back()->with('success', 'Cupón aplicado exitosamente.');
    }
}
