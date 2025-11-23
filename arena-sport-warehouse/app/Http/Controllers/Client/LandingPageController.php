<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;

class LandingPageController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->whereNull('deleted_at')
            ->take(4)
            ->get();

        return view('landing.index', compact('products'));
    }
}
