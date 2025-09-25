<?php

use Illuminate\Support\Facades\Route;

Route::fallback(function() {
    return view('fallback.fallback');
})->name('fallback');

Route::get('/admin', function () {
    return view('admin.app');
})->name('app');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

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
