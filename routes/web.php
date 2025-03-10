<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\VouchersController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\WishlistController;
use App\Models\Address;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Order;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ReviewController;



// USER

// HOME
Route::get("/", function () {
    return view('index');
});



Route::get('/user', function () {

    if (Auth::guest()) {
        return redirect('/login');
    }

    return view('user.index', [

    ]);
});

Route::get('/user/edit', function () {

    return view('user.edit', [

    ]);
});

Route::put('/user', [RegisteredUserController::class, 'update'])->name('user.update');

Route::patch('/user/orders/{order}/cancel', [\App\Http\Controllers\OrderController::class, 'cancel'])->name('user.orders.cancel');

Route::middleware('auth')->group(function () {
    Route::get('/user/addresses/create', [AddressController::class, 'create'])->name('address.create');
    Route::post('/user/addresses', [AddressController::class, 'store'])->name('address.store');
    Route::get('/user/addresses/{address}/edit', [AddressController::class, 'edit'])->name('address.edit');
    Route::put('/user/addresses/{address}', [AddressController::class, 'update'])->name('address.update');
    Route::delete('/user/addresses/{address}', [AddressController::class, 'destroy'])->name('address.destroy');
});



// CONTACT
Route::get('/contact', function () {
    return view('contact');
});

// PRODUCTS Resource
Route::resource('products', ProductController::class);
Route::post('/reviews/{product}', [ReviewController::class, 'store'])->name('reviews.show');

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

// Admin

Route::get('/admin', function () {

    if (Auth::guest()) {
        return redirect('/login');
    }

    $categories = Category::all();
    $products = Product::all();
    $discounts = Discount::all();
    $orders = Order::all();
    $roles = Role::all();
    $vouchers = Voucher::all();

    return view('admin.index', [
        'categories' => $categories,
        'products' => $products,
        'discounts' => $discounts,
        'orders' => $orders,
        'roles' => $roles,
        'vouchers' => $vouchers
    ]);
});

// ADMIN Resources
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
Route::resource('categories', CategoryController::class);
Route::resource('vouchers', VouchersController::class);
Route::resource('roles', RoleController::class);

// WISHLIST
Route::post('/wishlist/add/{product}', [WishlistController::class, 'add'])->name('wishlist.add');
Route::post('/wishlist/remove/{product}', [WishlistController::class, 'remove'])->name('wishlist.remove');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');


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

// Factura

// Ruta para generar y descargar la factura en PDF
Route::get('/shopping_cart/checkout/invoice', [CheckoutController::class, 'invoice'])->name('checkout.invoice');

// Cupon

Route::post('/shopping_cart/apply-coupon', [\App\Http\Controllers\ShoppingCartController::class, 'applyCoupon'])->name('shopping_cart.applyCoupon');


//Controlador para cambio de idioma

Route::post('/language', [LanguageController::class, 'change'])->name('language.change');

// Descuentos

Route::put('/admin/categories/{category}/discount', [\App\Http\Controllers\CategoryController::class, 'updateDiscount'])->name('admin.categories.discount.update');

// Reviews

Route::middleware('auth')->group(function () {
    Route::get('/reviews/create/{product}', [\App\Http\Controllers\ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/reviews/store/{product}', [\App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store');
});

// Tarjetas

Route::middleware('auth')->group(function () {
    Route::get('/payment_cards/create', [\App\Http\Controllers\PaymentCardController::class, 'create'])->name('payment_cards.create');
    Route::post('/payment_cards', [\App\Http\Controllers\PaymentCardController::class, 'store'])->name('payment_cards.store');
    Route::delete('/payment_cards/{paymentCard}', [\App\Http\Controllers\PaymentCardController::class, 'destroy'])->name('payment_cards.destroy');
});


