<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Name | Arena Sport Warehouse</title>
</head>
<body>
{{-- navbar --}}
<nav class="w-full flex flex-col">
    <div class="w-full flex flex-row justify-between opacity-70 px-20 py-6">
        <a href="{{ route('home') }}" class="hover:underline">Home</a>
        <a href="{{ route('categories') }}" class="hover:underline">Categories</a>
        <a href="{{ route('products') }}" class="hover:underline">Products</a>
    </div>
    <div class="px-20 py-6 outline-1 outline-gray-300 flex flex-row justify-between items-center">
        <a href="{{ route('home') }}" class="-ml-8 mr-4">
            <img src="{{ asset('/assets/ic_logo.svg') }}" alt="logo" class="w-44">
        </a>
        <div class="flex flex-row w-full gap-4 px-3 py-2 rounded-lg outline-1 outline-dark-gray">
            <img src="{{ asset('/assets/Search.svg') }}" alt="search" class="opacity-70 w-5">
            <input type="text" placeholder="Search product here..." class="focus:outline-0 w-full">
        </div>
        <div class="flex flex-row gap-5 w-fit h-fit pl-8">
            <a href="{{ route('profile.cart') }}">
                <img src="{{ asset('/assets/shopping-cart.svg') }}" alt="shopping cart" class="w-10">
            </a>
            <a href="{{ route('profile') }}">
                <img src="{{ asset('/assets/account_circle.svg') }}" alt="profile" class="w-10">
            </a>
        </div>
    </div>
</nav>

{{-- main --}}
<main class="py-10 px-16 flex flex-col gap-16">
    {{-- product data --}}
    <div class="flex flex-row gap-12 items-center">
        {{-- image --}}
        <div class="w-2/5 rounded-lg object-cover aspect-square overflow-hidden">
            <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}"
                 class="size-full hover:scale-105 hover:opacity-85 transition duration-200 object-cover">
        </div>
        {{-- data --}}
        <div class="flex flex-col gap-5">
            <h1 class="text-4xl font-bold">{{ $product->name }}</h1>
            <div class="flex flex-row gap-1 items-center">
                <img src="{{ asset('/assets/ic_bag.svg') }}" alt="star" class="size-5">
                <p><span class="text-dark-gray font-semibold text-lg opacity-50">{{ number_format(125) }} orders</span>
                </p>
            </div>
            <div class="flex flex-col">
                <h1 class="font-semibold">Stok Tersedia:</h1>
                <p class="text-3xl font-semibold">{{ $product->stock }}</p>
            </div>
            <div class="flex flex-col">
                <h1 class="font-semibold">Harga:</h1>
                <p class="text-3xl font-semibold">Rp{{ number_format($product->price) }}</p>
            </div>
            <form method="POST" onsubmit="">
                <div class="flex flex-col gap-1.5">
                    <label for="quantity" class="font-semibold">Jumlah:</label>
                    <input id="quantity" name="quantity" type="number" value="1" min="1"
                           class="py-2 px-3 rounded-md outline-1 w-fit">
                </div>
                <div class="flex flex-row gap-3">
                    <button type="submit"
                            class="bg-vibrant-orange hover:opacity-90 hover:drop-shadow-sm transition duration-200 cursor-pointer flex flex-row items-center gap-3 text-white rounded-lg px-5 py-3 font-medium">
                        <img src="{{ asset('/assets/ic_cart-white.svg') }}" alt="cart" class="size-5">
                        Tambah ke Keranjang
                    </button>
                    <button type="submit"
                            class="bg-dark-gray hover:opacity-90 hover:drop-shadow-sm transition duration-200 cursor-pointer flex flex-row items-center gap-3 text-white rounded-lg px-5 py-3 font-medium">
                        Beli Sekarang
                    </button>
                    <form onsubmit="{{ route('favorite.add', ['productId' => $product->id]) }}" method="POST">
                        @csrf
                        <button
                            type="submit"
                            class="bg-dark-gray hover:bg-pink-400 hover:drop-shadow-sm transition duration-200 cursor-pointer flex flex-row items-center gap-3 text-white rounded-lg p-3 font-medium">
                            <img src="{{ asset('/assets/favourite-white.svg') }}" alt="cart" class="size-7">
                        </button>
                    </form>
                </div>
            </form>
        </div>
    </div>

    {{-- description --}}
    <div class="flex flex-col gap-2">
        <span class="w-full bg-dark-gray h-[1px] opacity-70 mb-6"></span>
        <h1 class="font-semibold text-xl mb-4">Deskripsi</h1>
        <p class="text-lg">{{ $product->description }}</p>
    </div>

    {{-- reccomendation products --}}
    <div class="flex flex-col gap-2 mb-10">
        <span class="w-full bg-dark-gray h-[1px] opacity-70 mb-6"></span>
        <h1 class="font-semibold text-xl mb-4">Rekomendasi Produk Lainnya!</h1>
        <div id="products" class="grid grid-cols-4 justify-between">
            @foreach($products as $product)
                {{--  product card  --}}
                <x-product-card
                    imageUrl="{{ $product->image_url }}"
                    name="{{ $product->name }}"
                    description="{{ $product->description }}"
                    price={{ $product->price }}
                    orders=125
                    slug="{{ $product->slug }}"
                />
            @endforeach
        </div>
    </div>

</main>

{{-- footer --}}
@include('partial.footer')

@if(session('success'))
    <script>
        alert(session('success'));
    </script>
@else
    <script>
        alert(session('error'));
    </script>
@endif
</body>
</html>
