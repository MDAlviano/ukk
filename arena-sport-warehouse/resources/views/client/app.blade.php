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
        <a href="/" class="hover:underline">Home</a>
        <a href="/categories" class="hover:underline">Categories</a>
        <a href="/products" class="hover:underline">Products</a>
        <a href="/about" class="hover:underline">About</a>
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
<main class="flex flex-col gap-12 mb-24">
    {{--  jumbotron  --}}
    <div id="jumbotron" class="relative">
        <img src="{{ asset('/assets/ig_jumbotron.png') }}" alt="" class="w-full h-auto object-cover">
        <div class="absolute inset-0 flex flex-col justify-center gap-2 px-16">
            <h1 class="text-3xl text-white drop-shadow-lg">Gerak Lebih Mudah,</h1>
            <h1 class="text-6xl font-semibold text-white drop-shadow-lg">Belanja Lebih Cepat</h1>
            <h1 class="text-xl text-white drop-shadow-lg">hanya di</h1>
            <h1 class="text-7xl font-bold text-white drop-shadow-lg md:w-1/2 hover:text-vibrant-orange transition duration-200">
                Arena Sport Warehouse</h1>
        </div>
    </div>

    <div class="py-10 px-16 flex flex-col gap-16">
        {{--  categories  --}}
        <div id="categories" class="flex flex-col gap-6">
            <div class="flex flex-row justify-between">
                <h1 class="text-2xl font-semibold">Cari Berdasarkan Kategori</h1>
                <a href="/categories" class="hover:opacity-60 transition duration-200">Lihat Semua Kategori</a>
            </div>
            <div class="grid grid-cols-2">
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
            </div>
        </div>

        {{--  products  --}}
        <div id="products" class="flex flex-col gap-6">
            <div class="flex flex-row justify-between">
                <h1 class="text-2xl font-semibold">Cek Produk Kami!</h1>
                <a href="/products" class="hover:opacity-60 transition duration-200">Lihat Semua Produk</a>
            </div>
            <div class="flex flex-row gap-5">
                {{--  product card  --}}
                <x-home-product-card
                    imageUrl="/assets/placeholder.png"
                    name="Raket Yonex"
                    description="Raket Yonex terbaru yang sangat bagus"
                    price=200000
                    rate=4.5
                    reviews=125
                />
                <x-home-product-card
                    imageUrl="/assets/placeholder.png"
                    name="Raket Yonex"
                    description="Raket Yonex terbaru yang sangat bagus"
                    price=200000
                    rate=4.5
                    reviews=125
                />
                <x-home-product-card
                    imageUrl="/assets/placeholder.png"
                    name="Raket Yonex"
                    description="Raket Yonex terbaru yang sangat bagus"
                    price=200000
                    rate=4.5
                    reviews=125
                />
            </div>
        </div>

        {{--  services  --}}
        <div id="services" class="flex flex-col gap-6">
            <h1 class="text-2xl font-semibold">Layanan yang dapat Membantumu</h1>
            <div class="flex flex-row gap-6 justify-center items-stretch">
                <div class="flex-1 flex flex-col rounded-xl bg-white shadow-lg overflow-hidden cursor-pointer group">
                    <div class="flex flex-col gap-2 p-5 flex-1">
                        <h5 class="text-2xl font-medium">Online Payment Process</h5>
                        <p class="text-sm text-gray-600">Memudahkan mu dalam melakukan pembayaran yang cepat dan
                            aman</p>
                    </div>
                    <div class="overflow-hidden">
                        <img src="{{ asset('/assets/online-payment.png') }}"
                             alt="Online Payment"
                             class="w-full object-cover transition-transform duration-300 group-hover:scale-110">
                    </div>
                </div>
                <div class="flex-1 flex flex-col rounded-xl bg-white shadow-lg overflow-hidden cursor-pointer group">
                    <div class="flex flex-col gap-2 p-5 flex-1">
                        <h5 class="text-2xl font-medium">Pengiriman Terpercaya</h5>
                        <p class="text-sm text-gray-600">Memastikan barang dikirim dengan cepat melalui jasa pengiriman
                            terpercaya.</p>
                    </div>
                    <div class="overflow-hidden">
                        <img src="{{ asset('/assets/delivery.png') }}"
                             alt="Pengiriman"
                             class="w-full object-cover transition-transform duration-300 group-hover:scale-110">
                    </div>
                </div>
                <div class="flex-1 flex flex-col rounded-xl bg-white shadow-lg overflow-hidden cursor-pointer group">
                    <div class="flex flex-col gap-2 p-5 flex-1">
                        <h5 class="text-2xl font-medium">Keakuratan Data Barang</h5>
                        <p class="text-sm text-gray-600">Memastikan bahwa setiap produk selalu menampilkan stok yang
                            akurat.</p>
                    </div>
                    <div class="overflow-hidden">
                        <img src="{{ asset('/assets/faq.png') }}"
                             alt="Data Akurat"
                             class="w-full object-cover transition-transform duration-300 group-hover:scale-110">
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

{{-- footer --}}
@include('partial.footer')
</body>
</html>
