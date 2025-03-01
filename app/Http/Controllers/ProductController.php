<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        if (Auth::guest()) {
            return redirect('/login');
        }

        $products = Product::with('category')->latest('id')->paginate(5);

        return view('user.products.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        if (Auth::guest()) {
            return redirect('/login');
        }

        $categories = Category::all();

        return view('user.products.create', [
            'categories' => $categories
        ]);
    }

    public function show(Product $product)
    {
        return view('user.products.show', ['product' => $product]);
    }

    public function store()
    {
        request()->validate([
            'product_name' => ['required', 'min:3'],
            'sku' => ['required', 'min:8', 'max:8', 'unique:products'],
            'description' => [''],
            'category' => ['required', 'exists:categories,id'],
            'price' => ['required', 'numeric'],
            'stock' => ['required', 'numeric'],

        ]);

        Product::create([
            'name' => request('product_name'),
            'slug' => request('product_name'),
            'description' => request('description'),
            'price' => request('price'),
            'stock' => request('stock'),
            'sku' => request('sku'),
            'is_active' => true,
            'category_id' => request('category'),
        ]);

        return redirect('/products');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', ['product' => $product]);
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
