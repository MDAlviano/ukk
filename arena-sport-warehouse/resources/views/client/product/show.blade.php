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
        <a href="/" class="hover:underline">Home</a>
        <a href="/categories" class="hover:underline">Categories</a>
        <a href="/products" class="hover:underline">Products</a>
        <a href="/about" class="hover:underline">About</a>
    </div>
    <div class="px-20 py-6 outline-1 outline-gray-300 flex flex-row justify-between items-center">
        <a href="/" class="text-vibrant-orange font-bold text-lg">Arena Sport Warehouse</a>
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
<main class="py-10 px-16 flex flex-col gap-16">
    {{-- product data --}}
    <div class="flex flex-row gap-12 items-center">
        {{-- image --}}
        <div class="w-2/5 rounded-lg object-cover aspect-square overflow-hidden">
            <img src="{{ asset('/assets/placeholder.png') }}" alt="img" class="size-full hover:scale-105 hover:opacity-85 transition duration-200 object-cover">
        </div>
        {{-- data --}}
        <div class="flex flex-col gap-5">
            <h1 class="text-4xl font-bold">Raket Yonex</h1>
            <div class="flex flex-row gap-5">
                <div class="flex flex-row gap-1 items-center">
                    <img src="{{ asset('/assets/ic_star.svg') }}" alt="star" class="size-6">
                    <p><span class="text-[#FFB700] font-semibold text-lg">5.0 / 5.0</span></p>
                </div>
                <div class="flex flex-row gap-1 items-center">
                    <img src="{{ asset('/assets/ic_bag.svg') }}" alt="star" class="size-5">
                    <p><span class="text-dark-gray font-semibold text-lg opacity-50">{{ number_format(125) }} orders</span></p>
                </div>
            </div>
            <div class="flex flex-col">
                <h1 class="font-semibold">Stok Tersedia:</h1>
                <p class="text-3xl font-semibold">{{ number_format(10) }}</p>
            </div>
            <div class="flex flex-col">
                <h1 class="font-semibold">Stok Tersedia:</h1>
                <p class="text-3xl font-semibold">Rp{{ number_format(200000) }}</p>
            </div>
            <div class="flex flex-col gap-1.5">
                <h1 class="font-semibold">Jumlah:</h1>
                <input type="number" value="1" min="1" class="py-2 px-3 rounded-md outline-1 w-fit">
            </div>
            <div class="flex flex-row gap-3">
                <button class="bg-vibrant-orange hover:opacity-90 hover:drop-shadow-sm transition duration-200 cursor-pointer flex flex-row items-center gap-3 text-white rounded-lg px-5 py-3 font-medium">
                    <img src="{{ asset('/assets/ic_cart-white.svg') }}" alt="cart" class="size-5">
                    <p>Tambah ke Keranjang</p>
                </button>
                <button class="bg-dark-gray hover:opacity-90 hover:drop-shadow-sm transition duration-200 cursor-pointer flex flex-row items-center gap-3 text-white rounded-lg px-5 py-3 font-medium">
                    Beli Sekarang
                </button>
                <button class="bg-dark-gray hover:bg-pink-400 hover:drop-shadow-sm transition duration-200 cursor-pointer flex flex-row items-center gap-3 text-white rounded-lg p-3 font-medium">
                    <img src="{{ asset('/assets/favourite-white.svg') }}" alt="cart" class="size-7">
                </button>
            </div>
        </div>
    </div>

    {{-- description --}}
    <div class="flex flex-col gap-1.5">
        <span class="w-full bg-dark-gray h-[1px] opacity-70 mb-6"></span>
        <h1 class="font-semibold">Deskripsi</h1>
        <p class="text-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cilium dolore eu fugiat nulla pariatur.</p>
    </div>

    <div class="flex flex-col gap-1.5 mb-10">
        <span class="w-full bg-dark-gray h-[1px] opacity-70 mb-6"></span>
        <h1 class="font-semibold">Deskripsi</h1>
        <p class="text-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cilium dolore eu fugiat nulla pariatur.</p>
    </div>


</main>

{{-- footer --}}
@include('partial.footer')
</body>
</html>
