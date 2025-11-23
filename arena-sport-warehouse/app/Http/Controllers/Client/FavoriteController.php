<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $favorites = Favorite::with(['products', 'products.categories'])->where('user_id', $user->id)->whereNull('deleted_at')->get();

        return view('client.favorite.index', compact('favorites'));
    }

    public function add($productId)
    {
        $user = Auth::user();

        Favorite::create([
            'user_id' => $user->id,
            'product_id' => $productId,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
    }

    public function remove($productId)
    {
        $user = Auth::user();

        $product = Favorite::where('user_id', $user->id)->where('product_id', $productId)->first();

        $product->deleted_at = now();
        $product->save();

        return redirect()->back()->with('success', 'Berhasil menghapus produk!');
    }
}
