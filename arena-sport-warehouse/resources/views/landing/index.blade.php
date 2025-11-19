<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Arena Sport Warehouse</title>
</head>
<body class="scroll-smooth">

{{-- nav --}}
<nav class="w-full flex flex-row justify-between opacity-70 px-20 py-6 shadow-sm items-center">
    <a href="/" class="hover:underline">
        <img src="{{ asset('/assets/ic_logo.svg') }}" alt="logo" class="w-44">
    </a>
    <a href="#about" class="hover:underline">Tentang Kami</a>
    <a href="#products" class="hover:underline">Produk Kami</a>
    <a href="#services" class="hover:underline">Layanan</a>
    <a href="/login"
       class="bg-vibrant-orange px-4 py-2 items-center rounded-md text-white font-medium hover:opacity-90 transition duration-200">Login</a>
</nav>

{{-- jumbotron --}}
<div class="flex flex-row mx-20 gap-20 items-center">
    <img src="{{ asset('/assets/ig_img-landing.png') }}" alt="landing" class="w-1/2">
    <div class="flex flex-col text-vibrant-orange drop-shadow-sm font-medium gap-3">
        <h1 class="text-4xl">Gerak Lebih Mudah,</h1>
        <h1 class="text-6xl">Belanja lebih cepat</h1>
        <h1 class="text-2xl">hanya di</h1>
        <img src="{{ '/assets/ic_logo.svg' }}" alt="img" class="w-80 -ml-8">
    </div>
</div>

{{-- about us --}}
<div id="about" class="mt-8 flex flex-col mx-20 gap-6 items-center">
    <h1 class="font-semibold text-4xl">Tentang Kami</h1>
    <p class="text-xl text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
        incididunt ut
        labore et dolore
        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cilium dolore eu fugiat nulla
        pariatur.</p>
</div>

{{-- products --}}
<div id="products" class="mt-12 flex flex-col mx-20 gap-6 items-center">
    <h1 class="font-semibold text-4xl">Produk Unggulan Kami</h1>
    @if(session('empty'))
        <div class="w-full flex flex-col items-center py-20">
            <h1 class="font-medium text-dark-gray opacity-80">{{ session('empty') }}</h1>
        </div>
    @else
        <div class="grid grid-cols-4 gap-20">
            @foreach($products as $product)
                {{--  product card  --}}
                <x-home-product-card
                    imageUrl="{{ $product->image_url }}"
                    name="{{ $product->name }}"
                    description="{{ $product->description }}"
                    price={{ $product->price }}
                    orders=125
                />
            @endforeach
        </div>
    @endif
</div>

{{--  services  --}}
<div id="services" class="mt-12 flex flex-col mx-20 gap-6 items-center">
    <h1 class="font-semibold text-4xl">Layanan yang dapat Membantumu</h1>
    <div class="flex flex-row gap-6 justify-center items-stretch">
        <div class="flex-1 flex flex-col rounded-xl bg-white shadow-lg overflow-hidden cursor-pointer group">
            <div class="flex flex-col gap-2 p-5 flex-1">
                <h5 class="text-2xl font-medium">Online Payment Process</h5>
                <p class="text-sm text-gray-600">Memudahkan mu dalam melakukan pembayaran yang cepat dan
                    aman</p>
            </div>
            <div class="overflow-hidden">
                <img src="{{ asset('/assets/online-payment.png') }}"
                     alt="Online Payment"
                     class="w-full object-cover transition-transform duration-300 group-hover:scale-110">
            </div>
        </div>
        <div class="flex-1 flex flex-col rounded-xl bg-white shadow-lg overflow-hidden cursor-pointer group">
            <div class="flex flex-col gap-2 p-5 flex-1">
                <h5 class="text-2xl font-medium">Pengiriman Terpercaya</h5>
                <p class="text-sm text-gray-600">Memastikan barang dikirim dengan cepat melalui jasa pengiriman
                    terpercaya.</p>
            </div>
            <div class="overflow-hidden">
                <img src="{{ asset('/assets/delivery.png') }}"
                     alt="Pengiriman"
                     class="w-full object-cover transition-transform duration-300 group-hover:scale-110">
            </div>
        </div>
        <div class="flex-1 flex flex-col rounded-xl bg-white shadow-lg overflow-hidden cursor-pointer group">
            <div class="flex flex-col gap-2 p-5 flex-1">
                <h5 class="text-2xl font-medium">Keakuratan Data Barang</h5>
                <p class="text-sm text-gray-600">Memastikan bahwa setiap produk selalu menampilkan stok yang
                    akurat.</p>
            </div>
            <div class="overflow-hidden">
                <img src="{{ asset('/assets/faq.png') }}"
                     alt="Data Akurat"
                     class="w-full object-cover transition-transform duration-300 group-hover:scale-110">
            </div>
        </div>
    </div>
</div>

{{-- footer --}}
<footer class="mt-40 px-16 py-12 bg-dark-gray flex flex-col gap-8">
    <div class="flex flex-row w-full justify-between">
        <div class="flex flex-col gap-2 w-1/4 text-white">
            <a href="/" class="w-52 -ml-4"><img src="{{ asset('/assets/ic_logo.svg') }}" alt="logo"></a>
            <h1 class="text-xl font-bold text-vibrant-orange"></h1>
            <p class="text-sm">Arena Sport Warehouse adalah platform untuk belanja alat olahraga favoritmu dengan segala
                kemudahan fiturnya!</p>
            <div class="flex flex-row gap-2 items-center">
                <img src="{{ asset('/assets/ic_map-pin.svg') }}" alt="pin" class="size-6">
                <a href="https://maps.app.goo.gl/kbCVaRrxX5KHXNie6" target="_blank" class="text-sm hover:underline">Jl.
                    Pemuda no 44, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah</a>
            </div>
        </div>
        <div class="flex flex-row gap-48 text-white">
            <div class="flex flex-col gap-2">
                <h3 class="font-medium">Navigate</h3>
                <a href="#about" class="hover:underline text-sm">Tentang Kami</a>
                <a href="#products" class="hover:underline text-sm">Produk Kami</a>
                <a href="#services" class="hover:underline text-sm">Layanan</a>
            </div>
            <div class="flex flex-col gap-2">
                <h3 class="font-medium">Socials</h3>
                <div class="flex flex-row gap-2 items-center">
                    <img src="{{ asset('/assets/ic_instagram.svg') }}" alt="instagram" class="size-5">
                    <a href="/" class="hover:underline text-sm">@instagram</a>
                </div>
            </div>
        </div>
    </div>
    <span class="w-full bg-white h-[0.1px] opacity-50"></span>
    <p class="text-white text-sm font-medium w-full text-center opacity-70">@2025 Arena Sport Warehouse - All Rights
        Reserved</p>
</footer>

</body>
</html>
