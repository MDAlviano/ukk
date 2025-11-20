<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $data = $request->validate([
            'address_id' => 'required|exists:addresses,id',
            'shipping_price' => 'required|integer|min:0',
            'notes' => 'nullable|string|max:500',
        ]);

        $user = Auth::user();
        $carts = Cart::with('products')->where('user_id', $user->id)->get();
        return DB::transaction(function () use ($request, $user, $carts) {
            // 1. Hitung total
            $subtotal = $carts->sum(fn($c) => $c->quantity * $c->products->price);
            $total = $subtotal + $request->shipping_price;

            // 2. Cek stock
            foreach ($carts as $cart) {
                if ($cart->products->stock < $cart->quantity) {
                    throw new \Exception("Stok {$cart->products->name} tidak cukup!");
                }
            }

            // 3. Buat Order
            $order = Order::create([
                'order_number' => 'ORD-' . strtoupper(Str::random(10)),
                'user_id' => $user->id,
                'address_id' => $request->address_id,
                'final_price' => $total,
                'shipping_price' => $request->shipping_price,
                'payment_status' => 'pending',
                'status' => 'pending',
                'notes' => $request->notes,
            ]);

            // 4. Buat Order Items + kurangi stock
            foreach ($carts as $cart) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->products->price,
                ]);

                $cart->products->decrement('stock', $cart->quantity);
            }

            // 5. Buat Payment (simulasi)
            $payment = Payment::create([
                'order_id' => $order->id,
                'gateway' => 'simulation',
                'status' => 'pending',
            ]);

            // 6. Kosongkan cart
            Cart::where('user_id', $user->id)->delete();

            return redirect()->route('checkout.payment', $order->order_number);
        });
    }

    public function payment($orderNumber)
    {
        $order = Order::with(['orderItems.products', 'address'])->where('order_number', $orderNumber)->firstOrFail();
        return view('client.checkout.payment', compact('order'));
    }

    // Simulasi sukses bayar
    public function paymentSuccess($orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)->firstOrFail();

        DB::transaction(function () use ($order) {
            $order->payment_status = 'paid';
            $order->status = 'processing';
            $order->created_at = now();
            $order->save();

            $order->payment()->update([
                'status' => 'success',
                'created_at' => now(),
            ]);
        });

        return redirect()->route('profile.orders')->with('success', 'Pembayaran berhasil! Pesanan sedang diproses.');
    }
}
