<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $products = Category::all();

        return view('category.index', compact('products'));
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
        $category->save();


        return redirect()->route('category.index', with('success', 'Data berhasil ditambahkan'));
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

        return redirect()->route('category.index')->with('success', 'Data berhasil diupdate');
    }

    public function delete($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if (!$category) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $category->delete();

        return redirect()->route('category.index')->with('success', 'Data berhasil dihapus');
    }
}
