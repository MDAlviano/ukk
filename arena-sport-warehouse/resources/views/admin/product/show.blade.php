@extends('admin.app')

@section('content')
    <header class="px-8 py-5 bg-white drop-shadow-lg drop-shadow-[#00000028]">
        <h1 class="font-semibold text-2xl">Product Detail</h1>
    </header>

    <div class="mx-auto px-6 lg:px-12 py-12">
        <div class="grid lg:grid-cols-2 gap-12 items-start">
            <div class="flex flex-col gap-7">
                <div>
                    <h1 class="font-semibold text-3xl lg:text-4xl leading-tight">
                        {{ $product->name }}
                    </h1>
                </div>

                <div class="flex flex-row gap-3 items-center flex-wrap">
                <span class="py-2 px-4 rounded-md bg-vibrant-orange text-white text-sm font-medium
                              hover:drop-shadow-md transition duration-200">
                    Badminton
                </span>
                    <span class="font-semibold text-lg text-gray-700">
                    {{ $product->unique_id }}
                </span>
                </div>

                <div class="flex flex-col gap-3">
                    <h2 class="font-semibold text-lg">Deskripsi</h2>
                    <p class="text-gray-600 leading-relaxed">
                        {{ $product->description }}
                    </p>
                </div>

                <div class="flex flex-col gap-3">
                    <h2 class="font-semibold text-lg">Informasi Produk</h2>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex justify-between">
                            <span>Harga</span>
                            <span class="font-medium">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Stok</span>
                            <span class="font-medium">{{ $product->stock }}</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Terjual</span>
                            <span class="font-medium">
                            {{ \App\Models\OrderItem::where('product_id', $product->id)->count() }}
                        </span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="w-full">
                <div class="relative overflow-hidden rounded-xl shadow-lg">
                    <img
                        src="{{ asset('storage/' . $product->image_url) }}"
                        alt="{{ $product->name }}"
                        class="w-full h-96 lg:h-full lg:max-h-screen object-cover transition-transform duration-500 hover:scale-105">
                </div>
            </div>
        </div>
    </div>
@endsection
