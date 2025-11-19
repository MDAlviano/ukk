<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::all()->where('deleted_at', null);

        return view('admin.order.index', compact('orders'));
    }

    public function show($orderNumber)
    {
        $order = Order::with(['users', 'shipments', 'shipments.addresses', 'orderItems'])->where('order_number', $orderNumber)->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        return view('admin.order.show', compact('order'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([

        ]);
    }

    public function update($orderNumber, Request $request)
    {
        $data = $request->validate([
            'status' => 'required',
        ]);

        $order = Order::where('order_number', $orderNumber)->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $order->status = $data['status'];
        $order->updated_at = now();
        $order->save();

        return redirect()->route('admin.order.index')->with('success', 'Data berhasil diupdate');
    }
}
