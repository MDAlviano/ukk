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

{{-- main --}}
<main class="py-10 px-16 flex flex-col gap-16">
    {{-- filter & sort --}}
    <div class="flex flex-row w-full justify-between">
        {{-- filter --}}
        <div class="flex flex-col gap-2">
            <h1 class="font-medium text-dark-gray">Filter:</h1>
            {{-- category option --}}
            <div class="flex flex-row gap-4">
                    {{-- price option --}}
                    <select name="" id=""
                            class="flex flex-row gap-4 pr-8 py-2 rounded-md outline-1 outline-dark-gray text-dark-gray">
                        <option value="">Price</option>
                    </select>
                    {{-- rating option --}}
                    <select name="" id=""
                            class="flex flex-row gap-4 pr-8 py-2 rounded-md outline-1 outline-dark-gray text-dark-gray">
                        <option value="">Rating</option>
                    </select>
            </div>
        </div>

        {{-- sort --}}
        <div class="flex flex-col gap-2">
            <h1 class="font-medium text-dark-gray">Sort:</h1>
            {{-- sort --}}
            <select name="" id=""
                    class="flex flex-row gap-4 pr-8 py-2 rounded-md outline-1 outline-dark-gray text-dark-gray">
                <option value="">Berdasarkan Abjad A-Z</option>
            </select>
        </div>
    </div>

    {{-- products --}}
    <div id="products" class="flex flex-col gap-6">
        <div class="grid grid-cols-4">
            {{--  product card  --}}
            <div class="relative hover:scale-105 transition duration-200">
                <a href="/products/slug" class="flex flex-col gap-2 justify-center">
                    <div class="relative flex justify-end">
                        <img src="{{ asset('/assets/placeholder.png') }}" alt="Raket Yonex terbaru" class="rounded-xl w-full h-72 object-cover">
                        <!-- Tombol favorit DILUAR <a> agar tidak ikut ke href -->
                    </div>
                    <h1 class="text-2xl font-medium hover:opacity-90 transition duration-200">Test</h1>
                    <p class="text-sm">Raket Yonex terbaru yang sangat bagus</p>
                    <p class="font-semibold">Rp200.000</p>
                    <p>⭐ 5.0/5.0 (125 Ulasan)</p>
                </a>

                <!-- Tombol favorit: tetap di posisi semula, tapi di luar <a> -->
                <a href="javascript:void(0)" onclick="event.stopPropagation(); /* tambahkan logika favorit di sini */" class="absolute top-0 right-0 p-2 bg-white rounded-full m-4 hover:bg-slate-100 transition duration-200 z-10">
                    <img src="{{ asset('/assets/favourite.svg') }}" alt="favorit" class="size-5">
                </a>
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
