<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;

class LandingPageController extends Controller
{
/** Function index() untuk mengambil 4 produk dari database yang disimpan di variable products lalu mengembalikan view
 * 'landing.index' dan menyertakan variable products.
 */
    public function index()
    {
        $products = Product::query()
            ->whereNull('deleted_at')
            ->take(4)
            ->get();

        return view('landing.index', compact('products'));
    }
}
