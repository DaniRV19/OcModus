<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::guest()) {
            return redirect('/login');
        }

        // Si se envía un parámetro "category" en la URL, se filtran los productos
        if ($request->has('category') && $request->input('category') != '') {
            $products = Product::with(['category', 'images'])
                ->whereHas('category', function ($query) use ($request) {
                    $query->where('slug', $request->category);
                })
                ->latest('id')
                ->paginate(5);
        } else {
            $products = Product::with(['category', 'images'])->latest('id')->paginate(5);
        }
        

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
    $data = request()->validate([
        'product_name' => ['required', 'min:3'],
        'sku' => ['required', 'min:8', 'max:8', 'unique:products'],
        'description' => ['nullable'],
        'category' => ['required', 'exists:categories,id'],
        'price' => ['required', 'numeric'],
        'stock' => ['required', 'numeric'],
        'image_url' => ['required', 'url'], // Se valida que se envíe una URL válida
    ]);

    // Crear el producto
    $product = Product::create([
        'name' => $data['product_name'],
        'slug' => $data['product_name'],
        'description' => $data['description'],
        'price' => $data['price'],
        'stock' => $data['stock'],
        'sku' => $data['sku'],
        'is_active' => true,
        'category_id' => $data['category'],
    ]);

    $product->images()->create([
        'url' => $data['image_url'],
        'alt_text' => $data['product_name'], 
        'is_primary' => true,              
        'display_order' => 1,              
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
