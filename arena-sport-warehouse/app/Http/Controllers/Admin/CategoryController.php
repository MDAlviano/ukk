<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function store()
    {
        return view('admin.category.create');
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if (!$category) {
            return redirect()->route('admin.categories')->with('error', 'Data tidak ditemukan');
        }

        return view('admin.category.update', compact('category'));
    }

    public function index(Request $request)
    {
        $categories = Category::with(['products'])->whereNull('deleted_at')->get();

        return view('admin.category.index', compact('categories'));
    }

    public function search(Request $request)
    {
        $query = Category::whereNull('deleted_at');

        if ($request->filled('q')) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }

        $categories = $query->get();

        return view('admin.category.partials.table-body', compact('categories'))->render();
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'image' => 'required|file',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $fileName = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();

            $path = $image->storeAs('images/categories', $fileName, 'public');
            $data['image'] = $path;
        }

        $category = Category::create([
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'image_url' => $data['image'],
            'created_at' => now(),
        ]);

        return redirect()->route('admin.categories')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if (!$category) {
            return redirect()->route('admin.categories')->with('error', 'Data tidak ditemukan');
        }

        $products = $category->products;

        return view('admin.category.show', compact('products', 'category'));
    }

    public function productsSearch($slug, Request $request)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $query = $category->products->whereNull('deleted_at');

        // Search
        if ($request->filled('q')) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }

        // Filter Harga
        if ($request->filled('price') && $request->price !== 'all') {
            match ($request->price) {
                'cheap' => $query->where('price', '<', 50000),
                'medium' => $query->whereBetween('price', [50000, 200000]),
                'expensive' => $query->where('price', '>', 200000),
            };
        }

        // Sort
        $sort = $request->get('sort', 'name_asc');
        $query->orderBy(match ($sort) {
            'name_asc' => 'name',
            'name_desc' => 'name',
            'price_asc' => 'price',
            'price_desc' => 'price',
            'stock_asc' => 'stock',
            'stock_desc' => 'stock',
            default => 'name'
        }, str_ends_with($sort, '_desc') ? 'desc' : 'asc');

        $products = $query->get();

        return view('admin.category.partials.table-body-product', compact('products', 'category'))->render();
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'image' => 'required|file',
        ]);

        $category = Category::where('id', $id)->first();

        if (!$category) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $fileName = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();

            $path = $image->storeAs('images/categories', $fileName, 'public');
            $data['image'] = $path;
        }

        $category->update([
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'image_url' => $data['image'],
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.categories')->with('success', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $category = Category::where('id', $id)->first();

        if (!$category) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $category->deleted_at = now();
        $category->save();

        return redirect()->route('admin.categories')->with('success', 'Data berhasil dihapus');
    }
}
