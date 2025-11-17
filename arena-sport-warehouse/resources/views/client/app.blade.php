<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Arena Sport Warehouse</title>
</head>
<body>
{{-- navbar --}}
<nav class="w-full flex flex-col">
    <div class="w-full flex flex-row justify-between opacity-70 px-20 py-6">
        <a href="/home" class="hover:underline">Home</a>
        <a href="/categories" class="hover:underline">Categories</a>
        <a href="/products" class="hover:underline">Products</a>
    </div>
    <div class="px-20 py-6 outline-1 outline-gray-300 flex flex-row justify-between items-center">
        <a href="/home" class="-ml-8 mr-4">
            <img src="{{ asset('/assets/ic_logo.svg') }}" alt="logo" class="w-44">
        </a>
        <div class="flex flex-row w-full gap-4 px-3 py-2 rounded-lg outline-1 outline-dark-gray">
            <img src="{{ asset('/assets/Search.svg') }}" alt="search" class="opacity-70 w-5">
            <input type="text" placeholder="Search product here..." class="focus:outline-0 w-full">
        </div>
        <div class="flex flex-row gap-5 w-fit h-fit pl-8">
            <a href="/">
                <img src="{{ asset('/assets/shopping-cart.svg') }}" alt="shopping cart" class="w-10">
            </a>
            <a href="/profile">
                <img src="{{ asset('/assets/account_circle.svg') }}" alt="profile" class="w-10">
            </a>
        </div>
    </div>
</nav>

{{-- main --}}
<main class="flex flex-col gap-12 mb-24">
    {{--  jumbotron  --}}
    <div id="jumbotron" class="relative">
        <img src="{{ asset('/assets/ig_jumbotron.png') }}" alt="" class="w-full h-auto object-cover">
        <div class="absolute inset-0 w-1/2 flex flex-col justify-center gap-2 px-16">
            <h1 class="text-3xl text-white drop-shadow-lg">Halo,</h1>
            <h1 class="text-6xl font-semibold text-white drop-shadow-lg">Mau Belanja Apa</h1>
            <h1 class="text-6xl font-bold text-white drop-shadow-lg md:w-1/2 hover:text-vibrant-orange transition duration-200">{{ $fullName }}</h1>
        </div>
    </div>

    <div class="py-10 px-16 flex flex-col gap-16">
        {{--  categories  --}}
        <div id="categories" class="flex flex-col gap-6">
            <div class="flex flex-row justify-between">
                <h1 class="text-2xl font-semibold">Cari Berdasarkan Kategori</h1>
                <a href="/categories" class="hover:opacity-60 transition duration-200">Lihat Semua Kategori</a>
            </div>
            @if(session('categoryEmpty'))
                <div class="w-full flex flex-col items-center py-20">
                    <h1 class="font-medium text-dark-gray opacity-80">{{ session('categoryEmpty') }}</h1>
                </div>
            @else
                @foreach($categories as $category)
                    <div class="grid grid-cols-2 gap-x-6">
                        {{--  category card  --}}
                        <x-category-card
                            imageUrl="{{ $category->image_url }}"
                            name="{{ $category->name }}"
                            products={{ $category->products->count() }}
                            slug="{{ $category->slug }}"
                        />
                    </div>
                @endforeach
            @endif
        </div>

        {{--  products  --}}
        <div id="products" class="flex flex-col gap-6">
            <div class="flex flex-row justify-between">
                <h1 class="text-2xl font-semibold">Cek Produk Kami!</h1>
                <a href="/products" class="hover:opacity-60 transition duration-200">Lihat Semua Produk</a>
            </div>
            @if(session('productEmpty'))
                <div class="w-full flex flex-col items-center py-20">
                    <h1 class="font-medium text-dark-gray opacity-80">{{ session('categoryEmpty') }}</h1>
                </div>
            @else
                @foreach($products as $product)
                    <div class="grid grid-cols-4 justify-between">
                        {{--  product card  --}}
                        <x-product-card
                            imageUrl="{{ $product->image_url }}"
                            name="{{ $product->name }}"
                            description="{{ $product->description }}"
                            price={{ $product->price }}
                            orders=125
                            slug="{{ $product->slug }}"
                        />
                    </div>
                @endforeach
            @endif
        </div>
    </div>

</main>

{{-- footer --}}
@include('partial.footer')
</body>
</html>
