<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $query = Product::query()
            ->with('categories')
            ->whereNot('stock', 0)
            ->whereNull('deleted_at');

        if ($request->filled('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('category_id', $request->category);
            });
        }

        if ($request->filled('price')) {
            $range = explode('-', $request->price);

            if (count($range) == 2) {
                $min = $range[0];
                $max = $range[1] ?? null;

                $query->whereBetween('price', [$min, $max ?? PHP_INT_MAX]);
            }
        }

        match ($request->get('sort')) {
            'name_asc' => $query->orderBy('name', 'asc'),
            'name_desc' => $query->orderBy('name', 'desc'),
            'price_asc' => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            'latest' => $query->latest(),
            default => $query->latest(),
        };

        $products = $query;

        return view('client.product.index', compact('products', 'categories'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $products = Product::query()
            ->whereNot('id', $product->id)
            ->where('deleted_at', null)
            ->take(4);

        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan!');
        }

        return view('client.product.show', compact(['product', 'products']));
    }
}
