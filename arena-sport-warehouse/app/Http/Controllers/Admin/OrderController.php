<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with(['users'])->whereNull('deleted_at');

        // Filter Tanggal
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        // Filter Status
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Urutkan dari yang terbaru
        $orders = $query->latest()->get();

        // Daftar status untuk dropdown (bisa disesuaikan)
        $statusOptions = [
            'all'         => 'all',
            'pending'     => 'pending',
            'processing'  => 'processing',
            'shipped'     => 'shipped',
            'delivered'   => 'delivered',
            'cancelled'   => 'cancelled',
            'completed'   => 'completed',
        ];

        return view('admin.order.index', compact('orders', 'statusOptions'));
    }

    public function show($orderNumber)
    {
        $order = Order::with(['users', 'addresses', 'orderItems', 'orderItems.products', 'orderItems.products.categories'])->where('order_number', $orderNumber)->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        return view('admin.order.show', compact('order'));
    }

    public function update($orderId, Request $request)
    {
        $data = $request->validate([
            'status' => 'required',
        ]);

        $order = Order::where('id', $orderId)->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $order->status = $data['status'];
        $order->updated_at = now();
        $order->save();

        return redirect()->route('admin.orders')->with('success', 'Data berhasil diupdate');
    }
}
