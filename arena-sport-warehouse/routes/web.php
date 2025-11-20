<?php

use App\Http\Controllers\Client\LandingPageController;
use App\Http\Controllers\Client\UserController;
use Illuminate\Support\Facades\Route;

// Fallback route
Route::fallback(function () {
    return view('partial.fallback');
})->name('fallback');

// Landing Route
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

// Auth Route
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');

Route::controller(\App\Http\Controllers\Client\UserController::class)->prefix('user')->group(function () {
    Route::post('/register', 'register')->name('user.register');
    Route::post('/login', 'login')->name('user.login');
    Route::post('/logout', 'logout')->name('user.logout');
});

// Client Route
Route::middleware('auth')->group(function () {
    Route::get('/home', [\App\Http\Controllers\Client\HomeController::class, 'index'])->name('home');

    Route::get('/categories', [\App\Http\Controllers\Client\CategoryController::class, 'index'])->name('categories');
    Route::get('/categories/{slug}', [\App\Http\Controllers\Client\CategoryController::class, 'show'])->name('categories.show');

    Route::get('/products', [\App\Http\Controllers\Client\ProductController::class, 'index'])->name('products');
    Route::get('/products/{slug}', [\App\Http\Controllers\Client\ProductController::class, 'show'])->name('products.show');

    Route::view('/order/create', 'client.order.create');

    Route::get('/profile', [\App\Http\Controllers\Client\AddressController::class, 'index'])->name('profile');

    Route::view('/profile/edit', 'client.profile.edit');
    Route::put('/user/update', [\App\Http\Controllers\Client\UserController::class, 'update'])->name('profile.edit');

    Route::view('/profile/add-address', 'client.address.create');
    Route::post('/address/create', [\App\Http\Controllers\Client\AddressController::class, 'create'])->name('address.create');
    Route::get('/profile/update-address/{id}', [\App\Http\Controllers\Client\AddressController::class, 'edit'])->name('address.edit');
    Route::get('/address/update/{addressId}', [\App\Http\Controllers\Client\AddressController::class, 'update'])->name('address.update');

    Route::get('/profile/orders', [\App\Http\Controllers\Client\OrderController::class, 'index'])->name('profile.orders');
    Route::get('/profile/orders/{orderNumber}', [\App\Http\Controllers\Client\OrderController::class, 'show'])->name('profile.orders.show');

    Route::view('/profile/add-address', 'client.address.create');
    Route::post('/address/create', [\App\Http\Controllers\Client\AddressController::class, 'create'])->name('address.create');

    Route::get('/profile/cart', [\App\Http\Controllers\Client\CartController::class, 'index'])->name('profile.cart');
    Route::post('/cart/add/{productId}', [\App\Http\Controllers\Client\CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/{productId}', [\App\Http\Controllers\Client\CartController::class, 'remove'])->name('cart.remove');

    Route::get('/profile/favorite', [\App\Http\Controllers\Client\FavoriteController::class, 'index'])->name('profile.favorite');
    Route::post('/favorite/{productId}', [\App\Http\Controllers\Client\FavoriteController::class, 'add'])->name('favorite.add');
    Route::delete('/favorite/{productId}', [\App\Http\Controllers\Client\FavoriteController::class, 'remove'])->name('favorite.remove');
});

// Admin Route
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', \App\Http\Controllers\Admin\HomeController::class, 'index')->name('admin');

    Route::get('/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.orders');
    Route::get('/orders/{orderNumber}', [\App\Http\Controllers\Admin\OrderController::class, 'show'])->name('admin.orders.show');
    Route::put('/orders/{orderId}', [\App\Http\Controllers\Admin\OrderController::class, 'update'])->name('admin.orders.show');

    Route::controller(\App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index')->name('admin.products');

        Route::get('/products/{slug}', 'show')->name('admin.products.show');

        Route::get('/products/create-product', 'store');
        Route::post('/products/create', 'create')->name('admin.products.create');

        Route::get('/products/update-product/{slug}', 'edit')->name('admin.products.edit');
        Route::put('/products/update/{id}', 'update')->name('admin.products.update');
        Route::delete('/products/delete/{id}', 'delete')->name('admin.products.update');
    });

    Route::controller(\App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('admin.categories');

        Route::get('/categories/{slug}', 'show')->name('admin.categories.show');

        Route::view('/categories/create-category', 'admin.category.create');
        Route::post('/categories/create', 'create')->name('admin.category.create');

        Route::get('/categories/update-category/{slug}', 'edit')->name('admin.category.edit');
        Route::put('/categories/update/{id}', 'update')->name('admin.category.update');
        Route::put('/categories/delete/{id}', 'delete')->name('admin.category.delete');
    });

    Route::view('/reports', 'admin.report.index');
});
