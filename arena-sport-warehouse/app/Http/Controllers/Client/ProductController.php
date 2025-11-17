<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->where('deleted_at', null);

        if ($products->isEmpty()) {
            return redirect()->back()->with('empty', 'Produk belum tersedia saat ini.');
        }

        return view('client.product.index', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $products = Product::where('deleted_at', null)->take(4)->get();

        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan!');
        }

        return view('client.product.show', compact(['product', 'products']));
    }
}
