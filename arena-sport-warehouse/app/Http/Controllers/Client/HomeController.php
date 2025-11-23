<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $fullName = $user->full_name;

        $categories = Category::with('products')->whereNull('deleted_at')->take(4)->get();
        $products = Product::whereNull('deleted_at')->take(12)->get();

        return view('client.app', compact(['categories', 'products', 'fullName']))->with('success', 'Berhasil mendapatkan data kategori dan produk.');
    }
}
