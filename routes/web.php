<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

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

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

// Admin

Route::get('/admin', function () {
    return view('admin.index');
});
