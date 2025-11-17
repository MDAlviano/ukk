<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $products = Category::all()->where('deleted_at', null);

        return view('admin.category.index', compact('products'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'image' => 'required|file',
        ]);

        // Upload image to storage
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // File naming (product-name-timestamp.ext)
            $fileName = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();

            // Storing image and uri
            $path = $image->storeAs('images/categories', $fileName, 'public');
            $data['image'] = $path;
        }

        $category = Category::create($data);
        $category->slug = Str::slug($category->name);
        $category->created_at = now();
        $category->save();

        return redirect()->route('admin.category.index', with('success', 'Data berhasil ditambahkan'));
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if (!$category) {
            return redirect()->route('category.index')->with('error', 'Data tidak ditemukan');
        }

        $products = $category->products;

        return view('admin.category.show', compact('products'));
    }

    public function update($slug, Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable',
            'image' => 'nullable|file',
        ]);

        $category = Category::where('slug', $slug)->first();

        if (!$category) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // File naming (product-name-timestamp.ext)
            $fileName = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();

            // Storing image and uri
            $path = $image->storeAs('images/categories', $fileName, 'public');
            $data['image'] = $path;
        }

        $category->update($data);
        $category->updated_at = now();
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Data berhasil diupdate');
    }

    public function delete($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if (!$category) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $category->deleted_at = now();
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Data berhasil dihapus');
    }
}
