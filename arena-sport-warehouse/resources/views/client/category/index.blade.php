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
            <img src="{{ asset('/assets/Search.svg') }}" alt="search" class="opacity-70 w-5">
            <input type="text" placeholder="Search product here..." class="focus:outline-0 w-full">
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
@if(session('empty'))
    <main id="empty" class="px-20 py-16 flex flex-col items-center">
        <h1 class="font-medium text-dark-gray opacity-80">{{ session('empty') }}</h1>
    </main>
@else
    <main id="categories" class="px-20 py-16 grid grid-cols-2 gap-x-6">
        <h1 class="text-xl font-semibold">Jelajahi Semua Kategori yang Tersedia!</h1>
        @foreach($categories as $category)
            {{--  category card  --}}
            <x-category-card
                imageUrl="{{ $category->image_url }}"
                name="{{ $category->name }}"
                products={{ $category->products->count() }}
                slug="{{ $category->slug }}"
            />
        @endforeach
    </main>
@endif

{{-- footer --}}
@include('partial.footer')

@if(session('success'))
    <script>
        alert(session('success'));
    </script>
@else
    <script>
        alert(session('error'));
    </script>
@endif
</body>
</html>
