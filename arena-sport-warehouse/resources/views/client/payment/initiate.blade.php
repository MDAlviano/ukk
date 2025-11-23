<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Pembayaran Order {{ $order->order_number }}</title>
</head>
<body>
<header class="px-8 py-5 bg-white drop-shadow-lg drop-shadow-[#00000028]">
    <a href="{{ route('home') }}">
        <img src="{{ asset('/assets/ic_logo.svg') }}" alt="logo" class="w-22 ml-4">
    </a>
</header>

<div class="flex flex-col gap-6 mx-auto my-40">
    <h1 class="font-semibold text-2xl">Pembayaran Order #{{ $order->order_number }}</h1>

    <div class="flex flex-col outline-2 outline-gray-300 rounded-lg p-4 gap-3">
        <h2 class="font-semibold text-lg">Ringkasan Order a.n {{ $order->users->name }}</h2>
        <p>Total: <strong>Rp {{ number_format($order->final_price, 0, ',', '.') }}</strong></p>
        <p>Metode Pengiriman: {{ $order->shipping_method === 'delivery' ? 'Antar' : 'Ambil di Toko' }}</p>
        @if($order->shipping_method === 'delivery' && $order->address)
            <p>Alamat: {{ $order->addresses->address }}, {{ $order->addresses->city }}</p>
        @endif
    </div>

    <div id="snap-container"></div>  {{-- Midtrans popup di sini --}}

    <div id="result-container" class="hidden mt-4 p-4 bg-gray-100 rounded">
        <h3>Hasil Transaksi:</h3>
        <pre id="result-json"></pre>
        <a href="{{ route('profile.orders') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Lihat Order</a>
    </div>
</div>

{{-- Midtrans Snap JS (Sandbox) --}}
<script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Buat tombol pay
        const container = document.getElementById('snap-container');
        container.innerHTML = '<button id="pay-button" class="rounded-lg bg-vibrant-orange px-6 py-3 text-white font-semibold hover:opacity-80">Bayar Sekarang</button>';

        document.getElementById('pay-button').onclick = function() {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    document.getElementById('result-json').innerHTML = JSON.stringify(result, null, 2);
                    document.getElementById('result-container').classList.remove('hidden');
                    document.getElementById('pay-button').disabled = true;
                    // Optional: Auto redirect setelah 3 detik
                    setTimeout(() => location.href = "{{ route('profile.orders') }}", 3000);
                },
                onPending: function(result) {
                    alert('Pembayaran pending. Cek status di Midtrans.');
                    location.href = "{{ route('profile.orders') }}";
                },
                onError: function(result) {
                    alert('Pembayaran gagal: ' + (result.status_message || 'Unknown error'));
                    location.reload();
                },
                onClose: function() {
                    alert('Pembayaran dibatalkan.');
                    location.href = "{{ route('profile.orders') }}";
                }
            });
        };
    });
</script>
</body>
</html>
