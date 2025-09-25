<?php

use Illuminate\Support\Facades\Route;

Route::fallback(function() {
    return view('fallback.fallback');
})->name('fallback');

Route::get('/admin', function () {
    return view('app');
})->name('app');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/products', function () {
    return view('product.index');
});

Route::get('/orders', function() {
    return view('order.index');
});

Route::get('/create-product', function () {
    return view('product.create');
});

Route::get('/categories', function () {
    return view('category.index');
});

Route::get('/create-category', function () {
    return view('category.create');
});

Route::get('/reports', function () {
    return view('report.index');
});
