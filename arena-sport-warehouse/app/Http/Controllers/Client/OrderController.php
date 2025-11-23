<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $query = Order::where('user_id', $user->id)
            ->whereNull('deleted_at');

        // Filter Tanggal
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        // Filter Status (langsung dari field status)
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $orders = $query->latest()->get();

        // Daftar status yang ingin ditampilkan di dropdown
        $availableStatuses = [
            'all' => 'all',
            'pending' => 'pending',
            'processing' => 'processing',
            'shipped' => 'shipped',
            'delivered' => 'delivered',
            'cancelled' => 'cancelled',
            'completed' => 'completed',
        ];

        return view('client.order.index', compact('orders', 'availableStatuses'));
    }

    public function show($orderNumber)
    {
        $user = Auth::user();

        $order = Order::with(['users', 'addresses', 'orderItems', 'orderItems.products', 'orderItems.products.categories'])->where('order_number', $orderNumber)->where('user_id', $user->id)->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        return view('client.order.show', compact('order'));
    }

    public function create()
    {
        $user = Auth::user();

        // Ambil cart user
        $carts = Cart::with('products.categories')
            ->where('user_id', $user->id)
            ->get();

        if ($carts->isEmpty()) {
            return redirect()->route('profile.cart')->with('error', 'Keranjang kosong!');
        }

        // Hitung subtotal
        $subtotal = $carts->sum(function ($cart) {
            return $cart->quantity * $cart->products->price;
        });

        // Asumsi ongkir sementara (bisa diganti nanti dengan API kurir)
        $shippingPrice = 20000; // contoh: Rp20.000

        $finalPrice = $subtotal + $shippingPrice;

        // Ambil alamat user
        $addresses = $user->addresses()->get();

        return view('client.order.create', compact('carts', 'subtotal', 'shippingPrice', 'finalPrice', 'addresses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_method' => 'required|in:delivery,pickup',
            'address_id' => 'required|exists:addresses,id',
            'notes' => 'nullable|string|max:1000',
        ]);

        $user = Auth::user();
        $carts = Cart::with('products')->where('user_id', $user->id)->get();

        if ($carts->isEmpty()) {
            return back()->with('error', 'Keranjang kosong!');
        }

        $subtotal = $carts->sum(fn($cart) => $cart->quantity * $cart->products->price);

        // Tentukan ongkir berdasarkan metode
        $shippingMethod = $request->shipping_method;
        $shippingPrice = $shippingMethod === 'pickup' ? 0 : 25000;

        $finalPrice = $subtotal + $shippingPrice;

        // Jika pickup, address_id boleh null
        $addressId = $shippingMethod === 'delivery' ? $request->address_id : null;

        // Cek apakah address milik user
        if ($addressId) {
            $address = Address::where('user_id', $user->id)->findOrFail($addressId);
        }

        // Generate order number
        $orderNumber = 'ORD-' . strtoupper(Str::random(8));

        // Buat order
        $order = Order::create([
            'order_number' => $orderNumber,
            'user_id' => $user->id,
            'address_id' => $address->id,
            'final_price' => $finalPrice,
            'status' => 'pending',
            'payment_method' => null, // nanti diisi pas payment gateway
            'payment_status' => 'pending',
            'shipping_method' => $shippingMethod,
            'shipping_price' => $shippingPrice,
            'notes' => $request->notes,
        ]);

        // Buat order items + kurangi stock
        foreach ($carts as $cart) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $cart->products->price,
                'subtotal' => $cart->quantity * $cart->products->price,
                'created_at' => now()
            ]);

            // Kurangi stock
            $cart->products->decrement('stock', $cart->quantity);
        }

        // Kosongkan cart
        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('order.pay', $order)->with('success', 'Order berhasil dibuat! Silakan lakukan pembayaran.');
    }
}
