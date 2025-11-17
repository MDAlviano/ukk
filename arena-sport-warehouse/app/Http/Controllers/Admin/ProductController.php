<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('categories')->where('deleted_at', null)->get();

        return view('admin.product.index', compact('products'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'unique_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|file',
            'category_id' => 'required',
            'description' => 'required',
            'stock' => 'required',
        ]);

        // Upload image to storage
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // File naming (product-name-timestamp.ext)
            $fileName = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();

            // Storing image and uri
            $path = $image->storeAs('images/products', $fileName, 'public');
            $data['image'] = $path;
        }

        $product = Product::create($data);
        $product->slug = Str::slug($product->name);
        $product->created_at = time();
        $product->save();

        return redirect()->route('admin.product.index', with('success', 'Data berhasil ditambahkan'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->with('categories')->first();

        if (!$product) {
            return redirect()->route('product.index')->with('error', 'Data tidak ditemukan');
        }

        return view('admin.product.show', compact('product'));
    }

    public function update($slug, Request $request)
    {
        $data = $request->validate([
            'unique_id' => 'nullable',
            'name' => 'nullable',
            'price' => 'nullable',
            'image' => 'nullable|file',
            'category_id' => 'nullable',
            'description' => 'nullable',
            'stock' => 'nullable',
        ]);

        $product = Product::where('slug', $slug)->first();

        if (!$product) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // File naming (product-name-timestamp.ext)
            $fileName = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();

            // Storing image and uri
            $path = $image->storeAs('images/products', $fileName, 'public');
            $data['image'] = $path;
        }

        $product->update($data);
        $product->updated_at = time();

        return redirect()->route('admin.product.index')->with('success', 'Data berhasil diupdate');
    }

    public function delete($slug)
    {
        $product = Product::where('slug', $slug)->first();

        if (!$product) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $product->deleted_at = time();
        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Data berhasil dihapus');
    }
}
