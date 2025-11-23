<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function store()
    {
        $categories = Category::all()->whereNull('deleted_at');

        return view('admin.product.create', compact('categories'));
    }

    public function edit($slug)
    {
        $product = Product::where('slug', $slug)->with('categories')->first();

        if (!$product) {
            return redirect()->route('product.index')->with('error', 'Data tidak ditemukan');
        }

        $categories = Category::all();

        return view('admin.product.update', compact(['product', 'categories']));
    }

    public function index(Request $request)
    {
        $categories = Category::all()->whereNull('deleted_at');
        $products = Product::with('categories')->whereNull('deleted_at')->get();

        return view('admin.product.index', compact('products', 'categories'));
    }

    public function search(Request $request)
    {
        $query = Product::with('categories')->whereNull('deleted_at');

        // 1. Search nama produk
        if ($request->filled('q')) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }

        // 2. Filter Kategori
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category_id', $request->category);
        }

        // 3. Filter Harga
        if ($request->filled('price') && $request->price !== 'all') {
            switch ($request->price) {
                case 'cheap':   $query->where('price', '<', 50000); break;
                case 'medium':  $query->whereBetween('price', [50000, 200000]); break;
                case 'expensive': $query->where('price', '>', 200000); break;
            }
        }

        // 4. Sort
        $sort = $request->get('sort', 'name_asc');
        switch ($sort) {
            case 'name_asc':  $query->orderBy('name', 'asc'); break;
            case 'name_desc': $query->orderBy('name', 'desc'); break;
            case 'price_asc': $query  ->orderBy('price', 'asc'); break;
            case 'price_desc':$query  ->orderBy('price', 'desc'); break;
            case 'stock_asc': $query  ->orderBy('stock', 'asc'); break;
            case 'stock_desc':$query  ->orderBy('stock', 'desc'); break;
            default:          $query->orderBy('name', 'asc');
        }

        $products = $query->get();

        return view('admin.product.partials.table-body', compact('products'))->render();
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'unique_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|file',
            'category' => 'required',
            'description' => 'required',
            'stock' => 'required',
        ]);

        // Upload image to storage
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $fileName = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();

            $path = $image->storeAs('images/products', $fileName, 'public');
            $data['image'] = $path;
        }

        $product = Product::create([
            'unique_id' => $data['unique_id'],
            'slug' => Str::slug($data['name']),
            'name' => $data['name'],
            'price' => $data['price'],
            'category_id' => $data['category'],
            'description' => $data['description'],
            'stock' => $data['stock'],
            'image_url' => $data['image'],
            'created_at' => now(),
        ]);

        return redirect()->route('admin.products')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->with('categories')->first();

        if (!$product) {
            return redirect()->route('admin.products')->with('error', 'Data tidak ditemukan');
        }

        return view('admin.product.show', compact('product'));
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([
            'unique_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|file',
            'category' => 'required',
            'description' => 'required',
            'stock' => 'required',
        ]);

        $product = Product::where('id', $id)->first();

        if (!$product) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $fileName = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();

            $path = $image->storeAs('images/products', $fileName, 'public');
            $data['image'] = $path;
        }

        $product->update([
            'unique_id' => $data['unique_id'],
            'slug' => Str::slug($data['name']),
            'name' => $data['name'],
            'price' => $data['price'],
            'category_id' => $data['category'],
            'description' => $data['description'],
            'stock' => $data['stock'],
            'image_url' => $data['image'],
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.products')->with('success', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $product = Product::where('id', $id)->first();

        if (!$product) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $product->deleted_at = now();
        $product->save();

        return redirect()->route('admin.products')->with('success', 'Data berhasil dihapus');
    }
}
