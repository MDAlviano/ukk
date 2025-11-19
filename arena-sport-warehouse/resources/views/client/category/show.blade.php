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
    @if(session('empty'))
        <div id="empty" class="px-20 py-16">
            <h1 class="font-medium text-dark-gray opacity-80">{{ session('empty') }}</h1>
        </div>
    @else
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
    @endif
</main>

{{-- footer --}}
@include('partial.footer')
</body>
</html>
