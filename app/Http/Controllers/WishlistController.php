<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // Mostrar los productos favoritos del usuario
    public function index()
    {
        $wishlist = Auth::user()->wishlist()->get();
        return view('wishlist.index', compact('wishlist'));
    }

    // Agregar un producto a la wishlist
    public function add(Product $product)
    {
        $user = Auth::user();

        if (!$user->wishlist()->where('product_id', $product->id)->exists()) {
            $user->wishlist()->attach($product->id);
        }

        return back()->with('success', 'Producto añadido a favoritos.');
    }

    // Eliminar un producto de la wishlist
    public function remove(Product $product)
    {
        $user = Auth::user();
        $user->wishlist()->detach($product->id);

        return back()->with('success', 'Producto eliminado de favoritos.');
    }
}
