<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(5);

        return view('products.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        Product::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        return redirect('/products');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product)
    {
        // authorize (On hold...)
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);


        $product->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        return redirect('/products/' . $product->id);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/products');
    }
}
