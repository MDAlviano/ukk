<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        return view('client.category.index', compact('categories'));
    }

    public function show($slug, Request $request)
    {
        $category = Category::where('slug', $slug)->first();

        if ($category->isEmpty()) {
            return redirect()->back()->with('error', 'Kategori belum tersedia saat ini.');
        }

        $query = Product::query()
            ->where('category_id', $category->id)
            ->whereNull('deleted_at');

        if ($request->filled('price')) {
            $range = explode('-', $request->price);

            if (count($range) == 2) {
                $min = $range[0];
                $max = $range[1] ?? null;

                $query->whereBetween('price', [$min, $max ?? PHP_INT_MAX]);
            }
        }

        match ($request->get('sort')) {
            'name_asc'  => $query->orderBy('name', 'asc'),
            'name_desc' => $query->orderBy('name', 'desc'),
            'price_asc' => $query->orderBy('price', 'asc'),
            'price_desc'=> $query->orderBy('price', 'desc'),
            'latest'    => $query->latest(),
            default     => $query->latest(),
        };

        $products = $query;

        return view('client.category.show', compact('products'));
    }
}
