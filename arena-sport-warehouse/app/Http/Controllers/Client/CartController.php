<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $carts = Cart::with(['products', 'products.categories'])->where('user_id', $user->id)->where('deleted_at', null)->get();

        return view('client.cart.index', compact('carts'));
    }

    public function add($productId, Request $request)
    {
        $product = Product::where('id', $productId)->first();

        $data = $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->stock,
        ]);

        $user = Auth::user();

        Cart::create([
            'product_id' => $productId,
            'user_id' => $user->id,
            'quantity' => $data['quantity'],
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan produk ke keranjang!');
    }

    public function remove($productId)
    {
        $user = Auth::user();
        $cart = Cart::where('product_id', $productId)->where('user_id', $user->id)->first();

        if (!$cart) {
            return redirect()->route('client.cart.index')->with('error', 'Produk tidak ditemukan!');
        }

        $cart->deleted_at = now();
        $cart->save();

        return redirect()->route('profile.cart')->with('success', 'Berhasil menambahkan produk ke keranjang!');
    }
}
