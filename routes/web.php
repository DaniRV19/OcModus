<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

// HOME
Route::get("/", function () {
    return view('index');
});

// CONTACT
Route::get('/contact', function () {
    return view('contact');
});

// PRODUCTS Resource
Route::resource('products', ProductController::class);