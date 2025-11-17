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
        $fullName = $user->fullName;

        $categories = Category::with('products')->where('deleted_at', null)->take(4)->get();
        $products = Product::where('deleted_at', null)->take(12)->get();

        if ($categories->isEmpty()) {
            return redirect()->back()->with('categoryEmpty', 'Kategori belum tersedia saat ini.');
        }

        if ($products->isEmpty()) {
            return redirect()->back()->with('productEmpty', 'Produk belum tersedia saat ini.');
        }

        return view('client.app', compact('categories', 'products', 'fullName'))->with('success', 'Berhasil mendapatkan data kategori dan produk.');
    }
}
