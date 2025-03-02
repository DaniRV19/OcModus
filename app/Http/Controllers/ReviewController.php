<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        return view('user.reviews.create', compact('product'));
    }

    public function store(Request $request, $productId)
    {
        $validated = $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['required', 'string'],
        ]);

        Review::create([
            'user_id'   => Auth::id(),
            'product_id'=> $productId,
            'rating'    => $validated['rating'],
            'comment'   => $validated['comment'],
            'is_approved' => false, // O true, según tu lógica de aprobación
        ]);

        return redirect()->route('products.index')->with('success', 'Valoración enviada correctamente.');
    }
}
