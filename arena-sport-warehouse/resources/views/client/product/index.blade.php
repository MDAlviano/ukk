<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Our Products | Arena Sport Warehouse</title>
</head>
<body>
{{-- navbar --}}
<form action="">

</form>
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
            <input type="text" id="search" placeholder="Search product here..." class="focus:outline-0 w-full">
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
<main class="py-10 px-16 flex flex-col gap-16">
    {{-- filter & sort --}}
    <form method="GET" action="{{ route('products') }}" class="flex flex-row w-full justify-between">
        @csrf
        <div class="flex flex-col gap-2">
            <h1 class="font-medium text-dark-gray">Filter:</h1>
            <div class="flex flex-row gap-4">

                {{-- Filter Kategori --}}
                <select name="category" onchange="this.form.submit()" class="px-4 py-2 rounded-md border border-gray-300 text-dark-gray">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                {{-- Filter Harga --}}
                <select name="price" onchange="this.form.submit()" class="px-4 py-2 rounded-md border border-gray-300 text-dark-gray">
                    <option value="">Semua Harga</option>
                    <option value="0-100000" {{ request('price') == '0-100000' ? 'selected' : '' }}>Rp 0 - Rp 100.000
                    </option>
                    <option value="100001-500000" {{ request('price') == '100001-500000' ? 'selected' : '' }}>Rp 100.001
                        - Rp 500.000
                    </option>
                    <option value="500001-1000000" {{ request('price') == '500001-1000000' ? 'selected' : '' }}>Rp
                        500.001 - Rp 1.000.000
                    </option>
                    <option value="1000001" {{ request('price') == '1000001' ? 'selected' : '' }}>Di atas Rp 1.000.000
                    </option>
                </select>
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <h1 class="font-medium text-dark-gray">Urutkan:</h1>
            <select name="sort" class="px-4 py-2 rounded-md border border-gray-300 text-dark-gray"
                    onchange="this.form.submit()">
                <option value="">Paling Sesuai</option>
                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nama A → Z</option>
                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nama Z → A</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga Terendah</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga Tertinggi
                </option>
                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
            </select>
        </div>
    </form>

    {{-- products --}}
    @if($products->isEmpty())
        <div id="empty" class="px-20 py-24 flex flex-col items-center gap-3">
            <img src="{{ asset('/assets/ic_box-gray.svg') }}" alt="box" class="opacity-80 w-12">
            <h1 class="font-medium text-dark-gray opacity-80">Produk belum tersedia saat ini.</h1>
        </div>
    @else
        <div id="products" class="grid grid-cols-4 justify-between">
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
                                <p><span class="font-medium text-dark-gray">{{ \App\Models\OrderItem::where('product_id', $product->id)->sum('quantity')    }} Terjual</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</main>

{{-- footer --}}
@include('partial.footer')
</body>
</html>
