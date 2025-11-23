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
        <a href="{{ route('home') }}" class="hover:underline">Home</a>
        <a href="{{ route('categories') }}" class="hover:underline">Categories</a>
        <a href="{{ route('products') }}" class="hover:underline">Products</a>
    </div>
    <div class="px-20 py-6 outline-1 outline-gray-300 flex flex-row justify-between items-center">
        <a href="{{ route('home') }}" class="-ml-8 mr-4">
            <img src="{{ asset('/assets/ic_logo.svg') }}" alt="logo" class="w-44">
        </a>
        <div class="flex flex-row w-full gap-4 px-3 py-2 rounded-lg outline-1 outline-dark-gray">
            <input type="text" id="search-input" placeholder="Kategori Kami" disabled
                   class="focus:outline-0 w-full text-center">
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

{{-- categories --}}
@if($categories->isEmpty())
    <main id="empty" class="px-20 py-52 flex flex-col items-center gap-2">
        <img src="{{ asset('/assets/ic_box-gray.svg') }}" alt="box" class="opacity-80 w-12">
        <h1 class="font-medium text-dark-gray opacity-80">Kategori belum tersedia saat ini.</h1>
    </main>
@else
    <main id="categories" class="px-20 py-16 flex flex-col">
        <h1 class="text-xl font-semibold">Jelajahi Semua Kategori yang Tersedia!</h1>
        <div class="grid grid-cols-2 gap-x-6">
            @foreach($categories as $category)
                {{--  category card  --}}
                <div class="relative w-full h-64 rounded-xl overflow-hidden shadow-lg group my-3">
                    <img src="{{ asset('/storage/' . $category->image_url) }}" alt="{{ $category->name }}"
                         class="absolute w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">

                    <div class="absolute inset-0 flex flex-col justify-between p-6 text-white w-1/2 backdrop-blur-md">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-3xl font-bold drop-shadow-md">{{ $category->name }}</h3>
                                <p class="text-lg drop-shadow">{{ $category->products->count() }} products</p>
                            </div>
                        </div>

                        <a href="{{ route('categories.show', ['slug' => $category->slug]) }}" class="hover:opacity-80 transition duration-200">
                            <div class="flex flex-row gap-2 items-center">
                                <h1 class="text-xl">Jelajahi</h1>
                                <img src="{{ asset('/assets/ic_chevron-right.svg') }}" alt="explore" class="size-7">
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endif

@include('partial.footer')
</body>
</html>
