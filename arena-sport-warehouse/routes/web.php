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

Route::post('/user/register', [UserController::class, 'register'])->name('user.register');
Route::post('/user/login', [UserController::class, 'login'])->name('user.login');

// Client Route
Route::middleware('auth')->group(function () {
    Route::view('/home', 'client.app');

    Route::view('/categories', 'client.category.index');

    Route::view('/categories/slug', 'client.category.show');

    Route::view('/products', 'client.product.index');

    Route::view('/products/slug', 'client.product.show');

    Route::view('/order/create', 'client.order.create');

    Route::view('/profile', 'client.profile.index')->name('profile');

    Route::view('/profile/orders', 'client.order.index');

    Route::view('/profile/orders/show', 'client.order.show');

    Route::view('/profile/add-address', 'client.address.create');

    Route::view('/profile/cart', 'client.cart.index');

    Route::view('/profile/favorite', 'client.favorite.index');
});

// Admin Route
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::view('/', 'admin.home.index')->name('admin');

    Route::view('/orders', 'admin.order.index');

    Route::view('/orders/orderId', 'admin.order.show');

    Route::view('/products', 'admin.product.index');

    Route::view('/products/slug', 'admin.product.show');

    Route::view('/products/create', 'admin.product.create');

    Route::view('/products/update', 'admin.product.update');

    Route::view('/categories', 'admin.category.index');

    Route::view('/categories/slug', 'admin.category.show');

    Route::view('/categories/create', 'admin.category.create');

    Route::view('/categories/update', 'admin.category.update');

    Route::view('/reports', 'admin.report.index');
});
