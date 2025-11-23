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
        $query = Category::query();

        // Tambah fitur SEARCH
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $categories = $query->get();

        // Kalau request dari AJAX, return hanya grid kategorinya
        if ($request->ajax() || $request->wantsJson()) {
            return view('client.category.partials.category-grid', compact('categories'))->render();
        }

        return view('client.category.index', compact('categories'));
    }

    public function show($slug, Request $request)
    {
        $category = Category::where('slug', $slug)->first();

        if (!$category) {
            return redirect()->back()->with('error', 'Kategori belum tersedia saat ini.');
        }

        $query = Product::query()
            ->where('category_id', $category->id)
            ->whereNull('deleted_at');

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        if ($request->filled('q')) {
            $query->where('name', 'like', '%' . $request->q . '%');
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
            'name_asc'  => $query->orderBy('name', 'asc'),
            'name_desc' => $query->orderBy('name', 'desc'),
            'price_asc' => $query->orderBy('price', 'asc'),
            'price_desc'=> $query->orderBy('price', 'desc'),
            'latest'    => $query->latest(),
            default     => $query->latest(),
        };

        $products = $query->get();

        if ($request->ajax() || $request->wantsJson()) {
            return view('client.category.partials.category-product-grid', compact('products', 'category'))->render();
        }

        return view('client.category.show', compact('products', 'category'));
    }
}
