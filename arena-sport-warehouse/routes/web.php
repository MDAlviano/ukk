<?php

use Illuminate\Support\Facades\Route;

// Fallback Route

Route::fallback(function() {
    return view('fallback.fallback');
})->name('fallback');

// Auth Route
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Admin Route
Route::get('/admin', function () {
    return view('admin.app');
})->name('app');

Route::get('/orders', function() {
    return view('admin.order.index');
});

Route::get('/products', function () {
    return view('admin.product.index');
});

Route::get('/create-product', function () {
    return view('admin.product.create');
});

Route::get('/categories', function () {
    return view('admin.category.index');
});

Route::get('/create-category', function () {
    return view('admin.category.create');
});

Route::get('/reports', function () {
    return view('admin.report.index');
});

// Client Route
Route::get('/', function() {
    return view('client.app');
});
