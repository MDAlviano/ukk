<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $orders = Order::all()->where('deleted_at', null)->where('user_id', $user->id);

        return view('admin.order.index', compact('orders'));
    }

    public function show($orderNumber)
    {
        $user = Auth::user();

        $order = Order::with(['users', 'shipments', 'shipments.addresses', 'orderItems', 'orderItems.products', 'orderItems.products.categories'])->where('order_number', $orderNumber)->where('user_id', $user->id)->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        return view('admin.order.show', compact('order'));
    }
}
