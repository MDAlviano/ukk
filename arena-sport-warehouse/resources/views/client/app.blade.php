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
        <a href="" class="hover:underline">Home</a>
        <a href="" class="hover:underline">Categories</a>
        <a href="" class="hover:underline">Products</a>
        <a href="" class="hover:underline">About</a>
        <a href="" class="hover:underline">Contact</a>
    </div>
    <div class="px-20 py-6 outline-1 outline-gray-300 flex flex-row justify-between items-center">
        <a href="/" class="text-vibrant-orange font-bold text-lg">Arena Sport Warehouse</a>
        <div class="flex flex-row w-full gap-4 px-3 py-2 rounded-lg outline-2 border-dark-gray active:outline-0">
            <img src="{{ asset('/assets/Search.svg') }}" alt="search" class="opacity-70 w-5">
            <input type="text" placeholder="Search product here..." class="focus:outline-0 w-full">
        </div>
        <div class="flex flex-row gap-5 w-fit h-fit pl-8">
            <a href="/">
                <img src="{{ asset('/assets/shopping_cart.svg') }}" alt="shopping cart" class="w-10">
            </a>
            <a href="/">
                <img src="{{ asset('/assets/account_circle.svg') }}" alt="profile" class="w-10">
            </a>
        </div>
    </div>
</nav>

{{-- main --}}
<main class="py-10 px-16 flex flex-col gap-16">
    {{--  jumbotron  --}}
    <div id="jumbotron">

    </div>

    {{--  categories  --}}
    <div id="categories" class="flex flex-col gap-6">
        <div class="flex flex-row justify-between">
            <h1 class="text-xl font-semibold">Cari Berdasarkan Kategori</h1>
            <a href="/" class="hover:opacity-60 transition duration-200">Lihat Semua Kategori</a>
        </div>
        <div class="flex flex-row gap-5">
            {{--  category card  --}}
            <div class="relative flex justify-center">
                <img src="{{ asset('/assets/placeholder.png') }}" alt="category image" class="rounded-xl">
                <h5 class="absolute text-3xl font-medium text-white top-5">Test</h5>
            </div>
        </div>
    </div>

    {{--  products  --}}
    <div id="products" class="flex flex-col gap-6">
        <div class="flex flex-row justify-between">
            <h1 class="text-xl font-semibold">Cek Produk Kami!</h1>
            <a href="/" class="hover:opacity-60 transition duration-200">Lihat Semua Produk</a>
        </div>
        <div class="flex flex-row gap-5">
            {{--  product card  --}}
            <div class="flex flex-col gap-2 justify-center">
                <img src="{{ asset('/assets/placeholder.png') }}" alt="category image" class="rounded-xl">
                <h5 class="text-2xl font-medium">Test</h5>
                <p class="text-sm">Raket Yonex terbaru yang sangat bagus</p>
                <p class="font-semibold">Rp200.000</p>
                <p>⭐ 5.0/5.0 (125 Ulasan)</p>
            </div>
        </div>
    </div>

    {{--  services  --}}
    <div id="services" class="flex flex-col gap-6">
        <h1 class="text-xl font-semibold">Layanan yang dapat Membantumu</h1>
        <div class="flex flex-row justify-between">
            <div class="flex flex-col gap-2 justify-center rounded-xl bg-white shadow-xl hover:scale-105 transition duration-300 cursor-pointer">
                <div class="flex flex-col gap-2 p-5">
                    <h5 class="text-2xl font-medium">Frequently Asked Question</h5>
                    <p class="text-sm">Memastikan pertanyaan mu terjawab</p>
                </div>
                <img src="{{ asset('/assets/faq.png') }}" alt="category image">
            </div>
            <div class="flex flex-col gap-2 justify-center rounded-xl bg-white shadow-xl hover:scale-105 transition duration-300 cursor-pointer">
                <div class="flex flex-col gap-2 p-5">
                    <h5 class="text-2xl font-medium">Online Payment Process</h5>
                    <p class="text-sm">Memudahkan mu dalam melakukan pembayaran</p>
                </div>
                <img src="{{ asset('/assets/online-payment.png') }}" alt="category image">
            </div>
            <div class="flex flex-col gap-2 justify-center rounded-xl bg-white shadow-xl hover:scale-105 transition duration-300 cursor-pointer">
                <div class="flex flex-col gap-2 p-5">
                    <h5 class="text-2xl font-medium">Home Delivery Options</h5>
                    <p class="text-sm">Pastikan pesananmu sampai di depan rumah</p>
                </div>
                <img src="{{ asset('/assets/delivery.png') }}" alt="category image">
            </div>
        </div>
    </div>
</main>

{{-- footer --}}
<footer class="mt-20 bg-gray-300 py-10 px-16 flex flex-row gap-20">
    <div class="font-semibold">
        <h1 class="text-vibrant-orange text-xl">Arena Sport Warehouse</h1>
        <h4 class="opacity-80">Tempat belanja favoritmu!</h4>
    </div>
    <div class="flex flex-col gap-2">
        <h1 class="text-xl font-semibold">Links</h1>
        <span class="w-full h-[0.7px] bg-dark-gray"></span>
        <div class="flex flex-col gap-1 text-gray-500">
            <a href="/" class="hover:underline">
                Home
            </a>
            <a href="/categories" class="hover:underline">
                Categories
            </a>
            <a href="/products" class="hover:underline">
                Products
            </a>
            <a href="/about" class="hover:underline">
                About
            </a>
            <a href="/profile" class="hover:underline">
                Profile
            </a>
        </div>
    </div>
    <div class="flex flex-col gap-2">
        <h1 class="text-xl font-semibold">Follow Us</h1>
        <span class="w-full h-[0.7px] bg-dark-gray"></span>
        <div class="flex flex-row gap-1 items-center text-gray-500">
            <img src="{{ asset('/assets/instagram.svg') }}" alt="" class="h-5">
            <a href="/" class="hover:underline">@sportwarehouse</a>
        </div>
    </div>
    <div class="flex flex-col gap-2">
        <h1 class="text-xl font-semibold">Location</h1>
        <span class="w-full h-[0.7px] bg-dark-gray"></span>
        <p class="text-gray-500">Jl. Pemuda no 12 Kota Semarang Jawa Tengah</p>
    </div>
</footer>
</body>
</html>
