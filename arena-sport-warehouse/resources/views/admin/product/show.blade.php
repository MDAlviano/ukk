@extends('admin.app')

@section('content')
    <header class="px-8 py-5 bg-white drop-shadow-lg drop-shadow-[#00000028]">
        <h1 class="font-semibold text-2xl">Product Detail</h1>
    </header>

    <div class="flex flex-col justify-between gap-12 m-12 overflow-auto">
        <div class="flex flex-row justify-between gap-8">
            {{-- product data --}}
            <div class="flex flex-col gap-5">
                <h1 class="font-semibold text-3xl">{{ $product->name }}</h1>
                <div class="flex flex-row gap-3 items-center">
                    <h5 class="py-1 px-3 rounded-md bg-vibrant-orange text-white hover:drop-shadow-md transition duration-200">
                        Badminton</h5>
                    <h5 class="font-semibold text-lg">{{ $product->unique_id }}</h5>
                </div>
                <div class="flex flex-col gap-2">
                    <h1 class="font-semibold">Deskripsi:</h1>
                    <p>{{ $route->description }}</p>
                </div>
                <div class="flex flex-col gap-2">
                    <h1 class="font-semibold">Informasi Produk:</h1>
                    <ul class="space-y-1">
                        <li>Harga : Rp{{ number_format($product->price, 0, ',', '.') }}</li>
                        <li>Stok : {{ $product->stock }}</li>
                        <li>Terjual : {{ \App\Models\OrderItem::where('product_id', $product->id) }}</li>
                    </ul>
                </div>
            </div>

            {{-- product image --}}
            <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" class="w-full h-96 object-cover">
        </div>
    </div>

    @if(session('success'))
        <script>
            alert(session('success'));
        </script>
    @else
        <script>
            alert(session('error'));
        </script>
    @endif
@endsection
