<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/products', function () {
    return view('product.index');
});

Route::get('/create-product', function () {
    return view('product.create');
});
