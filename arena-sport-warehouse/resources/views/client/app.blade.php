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

{{-- main --}}
<main class="flex flex-col gap-12 mb-24">
    {{--  jumbotron  --}}
    <div id="jumbotron" class="relative">
        <img src="{{ asset('/assets/ig_jumbotron.png') }}" alt="" class="w-full h-auto object-cover">
        <div class="absolute inset-0 w-1/2 flex flex-col justify-center gap-2 px-16">
            <h1 class="text-4xl text-white drop-shadow-lg">Halo,</h1>
            <h1 class="text-6xl font-semibold text-white drop-shadow-lg">Mau Belanja Apa</h1>
            <h1 class="text-6xl font-bold text-white drop-shadow-lg hover:text-vibrant-orange transition duration-200">{{ $fullName }}
                ?</h1>
        </div>
    </div>

    <div class="py-10 px-16 flex flex-col gap-16">
        {{--  categories  --}}
        <div id="categories" class="flex flex-col gap-6">
            <div class="flex flex-row justify-between">
                <h1 class="text-2xl font-semibold">Cari Berdasarkan Kategori</h1>
                <a href="/categories" class="hover:opacity-60 transition duration-200">Lihat Semua Kategori</a>
            </div>
            @if($categories->isEmpty())
                <div class="w-full flex flex-col items-center py-10 gap-2">
                    <img src="{{ asset('/assets/ic_box-gray.svg') }}" alt="box" class="opacity-80 w-12">
                    <h1 class="font-medium text-dark-gray opacity-80">Kategori belum tersedia saat ini.</h1>
                </div>
            @else
                <div class="grid grid-cols-2 gap-x-6">
                    {{--  category card  --}}
                    @foreach($categories as $category)
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
            @endif
        </div>

        {{--  products  --}}
        <div id="products" class="flex flex-col gap-6">
            <div class="flex flex-row justify-between">
                <h1 class="text-2xl font-semibold">Cek Produk Kami!</h1>
                <a href="/products" class="hover:opacity-60 transition duration-200">Lihat Semua Produk</a>
            </div>
            @if($products->isEmpty())
                <div class="w-full flex flex-col items-center py-10 gap-2">
                    <img src="{{ asset('/assets/ic_box-gray.svg') }}" alt="box" class="opacity-80 w-12">
                    <h1 class="font-medium text-dark-gray opacity-80">Produk belum tersedia saat ini. </h1>
                </div>
            @else
                <div class="grid grid-cols-4 justify-between">
                    @foreach($products as $product)
                        {{--  product card  --}}
                        <div class="hover:shadow-lg my-4 transition duration-200 rounded-xl overflow-hidden w-fit hover:opacity-90 group">
                            <a href="{{ route('products.show', $product->slug) }}" class="flex flex-col justify-center items-start">
                                <div class="relative flex justify-end overflow-hidden">
                                    <img src="{{ asset('/storage/' . $product->image_url) }}" alt="Raket Yonex terbaru" class="self-start w-72 h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                                </div>
                                <div class="flex flex-col gap-2 p-3">
                                    <h1 class="text-2xl font-medium hover:opacity-90 transition duration-200">{{ $product->name }}</h1>
                                    <p class="text-sm truncate">{{ $product->description }}</p>
                                    <p class="font-semibold">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                                    <div class="flex flex-row gap-1 items-center">
                                        <img src="{{ asset('/assets/ic_bag.svg') }}" alt="star" class="size-5">
                                        <p><span class="font-medium text-dark-gray">{{ \App\Models\OrderItem::where('product_id', $product->id)->count()    }} Terjual</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

</main>

{{-- footer --}}
@include('partial.footer')

@if(session('success'))
    <script>
        alert(' {{ session('success') }}');
    </script>
@else
    <script>
        alert(' {{ session('error') }}');
    </script>
@endif
</body>
</html>
