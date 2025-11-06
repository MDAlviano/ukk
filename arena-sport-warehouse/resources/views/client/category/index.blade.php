<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Our Categories | Arena Sport Warehouse</title>
</head>
<body>
{{-- navbar --}}
<nav class="w-full flex flex-col">
    <div class="w-full flex flex-row justify-between opacity-70 px-20 py-6">
        <a href="/" class="hover:underline">Home</a>
        <a href="/categories" class="hover:underline">Categories</a>
        <a href="/products" class="hover:underline">Products</a>
        <a href="/about" class="hover:underline">About</a>
        <a href="/contact" class="hover:underline">Contact</a>
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
            <a href="/">
                <img src="{{ asset('/assets/account_circle.svg') }}" alt="profile" class="w-10">
            </a>
        </div>
    </div>
</nav>

{{-- categories --}}
<main id="categories" class="py-10 px-16  grid grid-cols-4 gap-6">
    {{--  category card  --}}
    <a href="/categories/slug" class="relative flex justify-center hover:scale-105 transition duration-200">
        <img src="{{ asset('/assets/placeholder.png') }}" alt="category image" class="rounded-xl">
        <h1 class="absolute text-3xl font-medium text-white top-5">Test</h1>
    </a>
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
