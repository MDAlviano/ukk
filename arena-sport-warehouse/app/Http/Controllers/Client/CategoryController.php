<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all()->where('deleted_at', null);

        if ($categories->isEmpty()) {
            return redirect()->back()->with('empty', 'Kategori belum tersedia saat ini.');
        }

        return view('client.category.index', compact('categories'));
    }

    public function show($slug, Request $request)
    {
        $category = Category::where('slug', $slug)->first();

        if ($category->isEmpty()) {
            return redirect()->back()->with('error', 'Kategori belum tersedia saat ini.');
        }

        $products = $category->products()->where('deleted_at', null)->get();

        return view('client.category.show', compact('products'));
    }
}
