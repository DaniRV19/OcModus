<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->simplePaginate(5);

        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required'
        ]);

        Category::create([
            'name' => request('name'),
            'slug' => request('slug'),
            'description' => request('description')
        ]);

        return redirect('/categories');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', ['category' => $category]);
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Category $category)
    {
        request()->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);

        $category->update([
            'name' => request('name'),
            'slug' => request('slug'),
            'description' => request('description'),
        ]);

        return redirect('/categories/' . $category->id);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('/categories');
    }
}
