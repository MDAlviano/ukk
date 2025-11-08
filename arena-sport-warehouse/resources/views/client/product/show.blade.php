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
            <a href="/profile">
                <img src="{{ asset('/assets/account_circle.svg') }}" alt="profile" class="w-10">
            </a>
        </div>
    </div>
</nav>

{{-- main --}}
<main class="py-10 px-16 flex flex-col gap-16">
    {{-- product data --}}
    <div class="flex flex-row gap-10 items-center">
        {{-- image --}}
        <img src="{{ asset('/assets/placeholder.png') }}" alt="img" class="h-96 rounded-lg">
        {{-- data --}}
        <div class="flex flex-col gap-4">
            <h1 class="text-4xl font-bold">Raket Yonex</h1>
            <p class="text-dark-gray font-medium">⭐ 5.0/5.0 (125 Ulasan)</p>
            <h3 class="text-2xl font-medium text-vibrant-orange">Rp200.000</h3>
            <div class="flex flex-row gap-3">
                {{-- add to favourite btn --}}
                <a href="">
                    <div class="flex flex-row py-3 px-5 items-center rounded-3xl gap-2 bg-black text-white hover:bg-dark-gray transition duration-200">
                        <img src="{{ asset('/assets/favourite-white.svg') }}" alt="shopping cart" class="size-5">
                        <p>Add to Cart</p>
                    </div>
                </a>
                {{-- add to cart btn --}}
                <a href="">
                    <div class="flex flex-row py-3 px-5 items-center rounded-3xl gap-2 bg-black text-white hover:bg-dark-gray transition duration-200">
                        <img src="{{ asset('/assets/shopping-cart-white.svg') }}" alt="shopping cart" class="size-5">
                        <p>Add to Cart</p>
                    </div>
                </a>
            </div>
            <div class="flex flex-col gap-1">
                <h1 class="font-semibold text-lg">Description:</h1>
                <p class="text-lg">Raket Yonex terbaru yang sangat bagusRaket Yonex terbaru yang sangat bagusRaket Yonex terbaru yang
                    sangat bagusRaket Yonex terbaru yang sangat bagusRaket Yonex terbaru yang sangat bagusRaket Yonex
                    terbaru yang sangat bagusRaket Yonex terbaru yang sangat bagus</p>
            </div>
        </div>
    </div>

    {{-- customer reviews --}}
    <div class="flex flex-col gap-4">
        <h1 class="font-semibold text-2xl">Reviews</h1>
        {{-- reviews --}}
        <x-review-card
            name="Alviano"
            rate=4.5
            date="08 November 2025"
            description="Product nya bagus sekali, aku suka banget. Makanya aku kasih rating 4,5 dari 5. Pas aku bawa buat main badminton bareng temen-temenku di atas rel kereta, enak banget rasanya. Kayak powerful banget gitu lho. Temen-temenku sampe pada nanya beli dimana, yaudah deh kusaranin buat beli di Toko Arena lewat web ini, gituuu. Jos deh mantep pokoknya!"
        />
        <x-review-card
            name="Alviano"
            rate=4.5
            date="08 November 2025"
            description="Product nya bagus sekali, aku suka banget. Makanya aku kasih rating 4,5 dari 5. Pas aku bawa buat main badminton bareng temen-temenku di atas rel kereta, enak banget rasanya. Kayak powerful banget gitu lho. Temen-temenku sampe pada nanya beli dimana, yaudah deh kusaranin buat beli di Toko Arena lewat web ini, gituuu. Jos deh mantep pokoknya!"
        />
        <x-review-card
            name="Alviano"
            rate=4.5
            date="08 November 2025"
            description="Product nya bagus sekali, aku suka banget. Makanya aku kasih rating 4,5 dari 5. Pas aku bawa buat main badminton bareng temen-temenku di atas rel kereta, enak banget rasanya. Kayak powerful banget gitu lho. Temen-temenku sampe pada nanya beli dimana, yaudah deh kusaranin buat beli di Toko Arena lewat web ini, gituuu. Jos deh mantep pokoknya!"
        />
    </div>
</main>

{{-- footer --}}
@include('partial.footer')
</body>
</html>
