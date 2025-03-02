<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Verificar que el usuario no haya valorado el producto antes
        $existingReview = $product->reviews()->where('user_id', Auth::id())->first();
        if ($existingReview) {
            return back()->with('error', 'Ya has valorado este producto.');
        }

        // Crear la valoración
        $review = new Review();
        $review->user_id = Auth::id();
        $review->product_id = $product->id();
        $review->rating = $request->rating;
        $review->is_approved = false; // La aprobación de la valoración se puede manejar más tarde
        $review->save();

        return back()->with('success', 'Tu valoración ha sido enviada y está pendiente de aprobación.');
    }
}
