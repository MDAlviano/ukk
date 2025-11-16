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

{{-- categories --}}
<main id="categories" class="px-20 py-16 grid grid-cols-2 gap-x-6">
    {{--  category card  --}}
    <x-category-card
        imageUrl="/assets/placeholder.png"
        name="Badminton"
        products=10
    />
    <x-category-card
        imageUrl="/assets/placeholder.png"
        name="Badminton"
        products=10
    />
    <x-category-card
        imageUrl="/assets/placeholder.png"
        name="Badminton"
        products=10
    />
    <x-category-card
        imageUrl="/assets/placeholder.png"
        name="Badminton"
        products=10
    />
    <x-category-card
        imageUrl="/assets/placeholder.png"
        name="Badminton"
        products=10
    />
</main>

{{-- footer --}}
@include('partial.footer')
</body>
</html>
