<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // fungsi untuk mengambil data produk
    public function index(Request $request)
    {
        $categories = Category::all();

        $query = Product::query()
            ->with('categories')
            ->whereNot('stock', 0)
            ->whereNull('deleted_at');

        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

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

        $products = $query->get();

        if ($request->ajax() || $request->wantsJson()) {
            return view('client.product.partials.product-grid', compact('products'))->render();
        }

        return view('client.product.index', compact('products', 'categories'));
    }

    // fungsi untuk mengambil data detail produk
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $products = Product::query()
            ->whereNot('id', $product->id)
            ->whereNull('deleted_at')
            ->take(4)->get();

        return view('client.product.show', compact(['product', 'products']));
    }
}
