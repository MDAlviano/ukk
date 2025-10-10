<?php

use Illuminate\Support\Facades\Route;

// Fallback route
Route::fallback(function () {
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
    return view('admin.home.index');
})->name('app');

Route::get('/admin/orders', function () {
    return view('admin.order.index');
});

Route::get('/admin/orders/orderId', function () {
    return view('admin.order.show');
});

Route::get('/admin/products', function () {
    return view('admin.product.index');
});

Route::get('/admin/products/slug', function () {
    return view('admin.product.show');
});

Route::get('/admin/products/create', function () {
    return view('admin.product.create');
});

Route::get('/admin/products/update', function () {
    return view('admin.product.update');
});

Route::get('/admin/categories', function () {
    return view('admin.category.index');
});

Route::get('/admin/categories/slug', function () {
    return view('admin.category.show');
});

Route::get('/admin/categories/create', function () {
    return view('admin.category.create');
});

Route::get('/admin/categories/update', function () {
    return view('admin.category.update');
});

Route::get('/admin/reports', function () {
    return view('admin.report.index');
});

// Client Route
Route::get('/', function () {
    return view('client.app');
});

Route::get('/categories', function () {
    return view('client.category.index');
});

Route::get('/products', function () {
   return view('client.product.index');
});

