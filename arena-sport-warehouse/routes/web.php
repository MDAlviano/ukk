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
    Route::get('/logout', 'logout')->name('user.logout');
});

// Client Route
Route::middleware(['auth', 'client'])->group(function () {
    Route::get('/home', [\App\Http\Controllers\Client\HomeController::class, 'index'])->name('home');

    Route::get('/categories', [\App\Http\Controllers\Client\CategoryController::class, 'index'])->name('categories');
    Route::get('/categories/search', [\App\Http\Controllers\Client\CategoryController::class, 'search'])->name('categories.search');

    Route::get('/categories/{slug}', [\App\Http\Controllers\Client\CategoryController::class, 'show'])->name('categories.show');

    Route::get('/products', [\App\Http\Controllers\Client\ProductController::class, 'index'])->name('products');
    Route::get('/products/{slug}', [\App\Http\Controllers\Client\ProductController::class, 'show'])->name('products.show');

    Route::get('/order/create', [\App\Http\Controllers\Client\OrderController::class, 'create'])->name('order.create');
    Route::post('/order', [\App\Http\Controllers\Client\OrderController::class, 'store'])->name('order.store');

    Route::get('/order/{order}/pay', [\App\Http\Controllers\Client\PaymentController::class, 'initiatePayment'])->name('order.pay');

    Route::get('/profile', [\App\Http\Controllers\Client\AddressController::class, 'index'])->name('profile');

    Route::get('/profile/edit', [\App\Http\Controllers\Client\UserController::class, 'edit'])->name('client.profile.edit');
    Route::put('/user/update', [\App\Http\Controllers\Client\UserController::class, 'update'])->name('profile.edit');

    Route::view('/profile/add-address', 'client.address.create');
    Route::post('/address/create', [\App\Http\Controllers\Client\AddressController::class, 'create'])->name('address.create');

    Route::get('/profile/update-address/{id}', [\App\Http\Controllers\Client\AddressController::class, 'edit'])->name('address.edit');
    Route::put('/address/update/{addressId}', [\App\Http\Controllers\Client\AddressController::class, 'update'])->name('address.update');

    Route::delete('/address/delete/{id}', [\App\Http\Controllers\Client\AddressController::class, 'delete'])->name('address.delete');

    Route::get('/profile/orders', [\App\Http\Controllers\Client\OrderController::class, 'index'])->name('profile.orders');
    Route::get('/profile/orders/{orderNumber}', [\App\Http\Controllers\Client\OrderController::class, 'show'])->name('profile.orders.show');

    Route::view('/profile/add-address', 'client.address.create');
    Route::post('/address/create', [\App\Http\Controllers\Client\AddressController::class, 'create'])->name('address.create');

    Route::get('/profile/cart', [\App\Http\Controllers\Client\CartController::class, 'index'])->name('profile.cart');

    Route::post('/cart/add/{id}', [\App\Http\Controllers\Client\CartController::class, 'add'])->name('cart.add');

    Route::delete('/cart/{productId}', [\App\Http\Controllers\Client\CartController::class, 'remove'])->name('cart.remove');

    Route::post('/favorite/toggle/{product}', [\App\Http\Controllers\Client\FavoriteController::class, 'toggle'])->name('favorite.toggle');

    Route::get('/profile/favorite', [\App\Http\Controllers\Client\FavoriteController::class, 'index'])->name('profile.favorite');

    Route::post('/favorite/{productId}', [\App\Http\Controllers\Client\FavoriteController::class, 'add'])->name('favorite.add');
    Route::delete('/favorite/{productId}', [\App\Http\Controllers\Client\FavoriteController::class, 'remove'])->name('favorite.remove');
});

// Admin Route
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.dashboard');

    Route::get('/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.orders');
    Route::get('/orders/{orderNumber}', [\App\Http\Controllers\Admin\OrderController::class, 'show'])->name('admin.orders.show');
    Route::patch('/orders/{orderId}', [\App\Http\Controllers\Admin\OrderController::class, 'update'])->name('admin.orders.update');

    Route::controller(\App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index')->name('admin.products');
        Route::get('/products/search', 'search')->name('admin.products.search');

        Route::get('/products/{slug}', 'show')->name('admin.products.show');

        Route::get('/create-product', 'store')->name('admin.products.store');
        Route::post('/products/create', 'create')->name('products.create');

        Route::get('/update-product/{slug}', 'edit')->name('admin.products.edit');
        Route::put('/products/update/{id}', 'update')->name('products.update');

        Route::delete('/products/delete/{id}', 'delete')->name('products.delete');
    });

    Route::controller(\App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('admin.categories');
        Route::get('/categories/search', 'search')->name('admin.categories.search');

        Route::get('/categories/{slug}', 'show')->name('admin.categories.show');
        Route::get('/categories/{slug}/products/search', 'productsSearch')->name('admin.category.products.search');

        Route::get('/create-category', 'store')->name('admin.category.store');
        Route::post('/categories/create', 'create')->name('category.create');

        Route::get('/update-category/{slug}', 'edit')->name('admin.category.edit');
        Route::put('/categories/update/{id}', 'update')->name('category.update');

        Route::delete('/categories/delete/{id}', 'delete')->name('category.delete');
    });

    Route::controller(\App\Http\Controllers\Admin\ReportController::class)->group(function () {
        Route::get('/reports', 'index')->name('admin.reports');
        Route::get('/report/monthly', 'monthly')->name('admin.report.monthly');
    });
});

Route::post('/midtrans-notification', [\App\Http\Controllers\Client\PaymentController::class, 'handleNotification'])->name('midtrans.notification');
