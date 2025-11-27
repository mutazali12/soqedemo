<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\ProductController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\CheckoutController;

// Home
Route::get('/', function () {
    return view('home');
})->name('home');

// Language Switcher
Route::get('/set-locale/{locale}', function ($locale) {
    if (in_array($locale, ['ar', 'en'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return back();
})->name('set-locale');

// Authentication (Breeze)
require __DIR__.'/auth.php';

// Customer Routes
Route::middleware(['auth', 'customer'])->prefix('customer')->group(function () {
    Route::get('/dashboard', function () {
        return view('customer.dashboard');
    })->name('customer.dashboard');

    // Products
    Route::get('/products', [ProductController::class, 'index'])->name('customer.products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('customer.products.show');
    Route::get('/api/products/search', [ProductController::class, 'search'])->name('customer.products.search');

    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('customer.cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('customer.cart.add');
    Route::post('/cart/update/{product}', [CartController::class, 'update'])->name('customer.cart.update');
    Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('customer.cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('customer.cart.clear');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('customer.checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('customer.checkout.store');

    // Orders
    Route::get('/orders', function () {
        return view('customer.orders.index');
    })->name('customer.orders.index');

    Route::get('/orders/{order}', function () {
        return view('customer.orders.show');
    })->name('customer.orders.show');
});

// Seller Routes
Route::middleware(['auth', 'seller'])->prefix('seller')->group(function () {
    Route::get('/dashboard', function () {
        return view('seller.dashboard');
    })->name('seller.dashboard');

    Route::get('/products', function () {
        return view('seller.products.index');
    })->name('seller.products.index');

    Route::get('/orders', function () {
        return view('seller.orders.index');
    })->name('seller.orders.index');
});

// Delivery Routes
Route::middleware(['auth', 'delivery'])->prefix('delivery')->group(function () {
    Route::get('/dashboard', function () {
        return view('delivery.dashboard');
    })->name('delivery.dashboard');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
