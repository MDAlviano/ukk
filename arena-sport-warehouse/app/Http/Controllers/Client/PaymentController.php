<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Midtrans\Notification;
use PHPUnit\Exception;

class PaymentController extends Controller
{
    public function initiatePayment(Order $order)
    {
        if ($order->payment_status !== 'pending') {
            return redirect()->route('profile.orders')->with('error', 'Order sudah diproses!');
        }

        $subtotal = $order->orderItems->sum(fn($item) => $item->unit_price * $item->quantity);

        $item_details = $order->orderItems->map(function ($item) {
            return [
                'id'       => 'PROD-' . $item->product_id,
                'price'    => (int) $item->unit_price,
                'quantity' => (int) $item->quantity,
                'name'     => substr($item->products->name, 0, 50),
            ];
        })->toArray();

        if ($order->shipping_price > 0) {
            $item_details[] = [
                'id'       => 'SHIPPING',
                'price'    => (int) $order->shipping_price,
                'quantity' => 1,
                'name'     => 'Biaya Pengiriman (Antar)',
            ];
        }

        $gross_amount = (int) array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $item_details));

        $params = [
            'transaction_details' => [
                'order_id'     => $order->order_number,
                'gross_amount' => $gross_amount,
            ],
            'item_details' => $item_details,
            'customer_details' => [
                'first_name' => $order->users->full_name,
                'email'      => $order->users->email,
                'phone'      => $order->users->phone,
            ],
        ];

        if ($order->shipping_method === 'delivery' && $order->address) {
            $params['shipping_address'] = [
                'first_name'   => $order->addresses->recipient_name,
                'address'      => $order->addresses->address . ($order->addresses->additional_information ? ', ' . $order->addresses->additional_information : ''),
                'city'         => $order->addresses->city,
                'postal_code'  => $order->addresses->postal_code,
                'phone'        => $order->users->phone,
            ];
        }

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return view('client.payment.initiate', compact('snapToken', 'order'));
        } catch (Exception $e) {
            Log::error('Midtrans Error: ' . $e->getMessage());
            return back()->with('error', 'Gagal membuat pembayaran. Silakan coba lagi.');
        }
    }

    public function handleNotification(Request $request)
    {
        $notif = new Notification();

        $orderNumber = $notif->order_id;
        $transactionStatus = $notif->transaction_status;
        $fraudStatus = $notif->fraud_status;
        $paymentType = $notif->payment_type;

        $order = Order::where('order_number', $orderNumber)->first();

        if (!$order) {
            Log::error('Order not found: ' . $orderNumber);
            return response()->json(['status' => 'error'], 404);
        }

        Log::info("Notification received: Order {$orderNumber}, Status: {$transactionStatus}, Fraud: {$fraudStatus}, Type: {$paymentType}");

        // Update payment_method
        $order->update(['payment_method' => $paymentType]);

        // Logic update status berdasarkan Midtrans
        if ($transactionStatus == 'capture') {
            if ($fraudStatus == 'accept') {
                $order->update([
                    'payment_status' => 'paid',
                    'status' => 'processing',
                ]);
                Log::info('Payment success for order: ' . $orderNumber);
            } elseif ($fraudStatus == 'challenge') {
                $order->update(['payment_status' => 'pending']);  // Tunggu verifikasi
                Log::info('Payment challenge for order: ' . $orderNumber);
            } else {
                $order->update(['payment_status' => 'failed']);
                Log::info('Payment fraud for order: ' . $orderNumber);
            }
        } elseif (in_array($transactionStatus, ['settlement', 'pending'])) {
            $order->update(['payment_status' => 'paid']);
            $order->update(['status' => 'processing']);
            Log::info('Payment settled/pending for order: ' . $orderNumber);
        } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
            $order->update([
                'payment_status' => in_array($transactionStatus, ['deny', 'expire']) ? $transactionStatus : 'failed',
                'status' => 'cancelled',
            ]);
            Log::info('Payment failed/cancelled for order: ' . $orderNumber);
        }

        return response()->json(['status' => 'received']);
    }
}
