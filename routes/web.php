<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\CheckoutController;

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

// SHOPPING CART
Route::get('/shopping_cart', [ShoppingCartController::class, 'index'])->name('shopping_cart.index');
Route::post('/shopping_cart/add', [ShoppingCartController::class, 'add'])->name('shopping_cart.add');

// Rutas para actualizar y eliminar ítems del carrito
Route::put('/shopping_cart/update/{rowId}', [ShoppingCartController::class, 'update'])->name('shopping_cart.update');
Route::delete('/shopping_cart/remove/{rowId}', [ShoppingCartController::class, 'remove'])->name('shopping_cart.remove');

// Checkout
Route::get('/shopping_cart/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/shopping_cart/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/shopping_cart/checkout/confirmation', [CheckoutController::class, 'confirmation'])->name('checkout.confirmation');