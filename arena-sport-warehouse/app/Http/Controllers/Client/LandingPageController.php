<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;

class LandingPageController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->whereNotNull('deleted_at')
            ->take(4)
            ->get();

            if($products->isEmpty()){
            return redirect()->back()->with('empty', 'Produk masih kosong');
        }

        return view('client.landing.index', compact('products'))->with('success', 'Berhasil mendapatkan produk');
    }
}
