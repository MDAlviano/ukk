<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Arena Sport Warehouse</title>
</head>
<body class="scroll-smooth min-h-screen overflow-x-hidden">

{{-- nav --}}
<nav
    class="w-full flex flex-row justify-between opacity-70 px-5 sm:px-10 lg:px-20 py-4 sm:py-6 shadow-sm items-center fixed top-0 left-0 right-0 bg-white z-50">
    <a href="/" class="hover:underline">
        <img src="{{ asset('/assets/ic_logo.svg') }}" alt="logo" class="w-28 sm:w-32 lg:w-44">
    </a>
    <div class="hidden md:flex flex-row gap-6 lg:gap-10 items-center">
        <a href="#about" class="hover:underline text-sm lg:text-base">Tentang Kami</a>
        <a href="#products" class="hover:underline text-sm lg:text-base">Produk Kami</a>
        <a href="#services" class="hover:underline text-sm lg:text-base">Layanan</a>
        <a href="/login"
           class="bg-vibrant-orange px-4 py-2 rounded-md text-white font-medium hover:opacity-90 transition duration-200 text-sm">
            Login
        </a>
    </div>

    <button id="mobile-menu-btn" class="md:hidden p-1"> <svg class="w-7 h-7 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>
</nav>

<div id="mobile-menu" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden">
    <div class="fixed right-0 top-0 h-full w-2/3 sm:w-1/2 bg-white shadow-xl p-6 flex flex-col gap-6">
        <button id="close-menu" class="self-end p-1">
            <svg class="w-7 h-7 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        <a href="#about" class="hover:underline text-lg">Tentang Kami</a>
        <a href="#products" class="hover:underline text-lg">Produk Kami</a>
        <a href="#services" class="hover:underline text-lg">Layanan</a>
        <a href="/login" class="bg-vibrant-orange px-6 py-3 rounded-md text-white font-medium text-center">Login</a>
    </div>
</div>

{{-- jumbotron --}}
<div class="flex flex-col lg:flex-row mx-6 sm:mx-10 lg:mx-20 gap-8 sm:gap-10 lg:gap-20 items-center mt-24 sm:mt-28 lg:mt-32 pt-4">
    <img src="{{ asset('/assets/ig_img-landing.png') }}" alt="landing" class="w-full lg:w-1/2 object-contain hidden lg:block">

    <div class="flex flex-col text-vibrant-orange drop-shadow-sm font-medium gap-3 sm:gap-4 text-center lg:text-left">
        <h1 class="text-3xl sm:text-4xl lg:text-4xl">Gerak Lebih Mudah,</h1>
        <h1 class="text-4xl sm:text-6xl lg:text-6xl leading-snug sm:leading-tight">Belanja lebih cepat</h1>
        <h1 class="text-xl sm:text-2xl lg:text-2xl">hanya di</h1>
        <img src="{{ '/assets/ic_logo.svg' }}" alt="img" class="w-56 sm:w-64 lg:w-80 -ml-0 lg:-ml-8 mx-auto lg:mx-0">
    </div>
</div>

{{-- about us --}}
<div id="about" class="mt-16 lg:mt-20 flex flex-col mx-6 sm:mx-10 lg:mx-20 gap-6 items-center">
    <h1 class="font-semibold text-3xl sm:text-4xl text-center">Tentang Kami</h1>
    <p class="text-base sm:text-lg text-center max-w-4xl">
        Arena Sport Warehouse hadir sebagai destinasi utama bagi pecinta olahraga di Semarang dan seluruh Indonesia. Kami adalah toko perlengkapan olahraga terlengkap yang berkomitmen menyediakan produk berkualitas tinggi dari brand-brand ternama dunia maupun lokal, mulai dari sepatu running, raket badminton, bola sepak, pakaian training, hingga alat fitness rumahan. Didirikan dengan semangat untuk mendukung gaya hidup aktif dan sehat, kami ingin setiap orang bisa bergerak lebih leluasa dan mencapai performa terbaiknya.
        Kami percaya bahwa olahraga bukan sekadar aktivitas, tapi bagian dari identitas dan kebahagiaan hidup. Oleh karena itu, setiap produk yang kami sajikan telah melalui proses kurasi ketat agar sesuai dengan kebutuhan atlet profesional, penggemar olahraga rekreasi, hingga anak-anak yang baru memulai perjalanan aktif mereka. Dari lapangan futsal di kota hingga gym di rumah, kami ingin menjadi teman setia yang selalu siap mendampingi langkahmu.
    </p>
</div>

{{-- products --}}
<div id="products" class="mt-16 lg:mt-20 flex flex-col mx-6 sm:mx-10 lg:mx-20 gap-8 items-center">
    <h1 class="font-semibold text-3xl sm:text-4xl text-center">Produk Unggulan Kami</h1>
    @if($products->isEmpty())
        <div class="w-full flex flex-col items-center py-20">
            <h1 class="font-medium text-dark-gray opacity-80">Belum ada produk yang tersedia.</h1>
        </div>
    @else
        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6 lg:gap-8 w-full">
            @foreach($products as $product)
                <div
                    class="hover:shadow-lg transition duration-200 rounded-xl overflow-hidden w-full hover:opacity-90 group"> <div class="flex flex-col justify-center items-start">
                        <div class="relative flex justify-end overflow-hidden">
                            <img src="{{ asset('/storage/' . $product->image_url) }}" alt="{{ $product->name }}"
                                 class="w-full h-40 sm:h-56 lg:h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                        </div>
                        <div class="flex flex-col gap-2 p-3 w-full"> <h1 class="text-lg sm:text-xl lg:text-2xl font-medium hover:opacity-90 transition duration-200 truncate">{{ $product->name }}</h1> <p class="text-xs sm:text-sm truncate">{{ $product->description }}</p> <p class="font-semibold text-sm sm:text-base">Rp{{ number_format($product->price, 0, ',', '.') }}</p> <div class="flex flex-row gap-1 items-center">
                                <img src="{{ asset('/assets/ic_bag.svg') }}" alt="star" class="size-4 sm:size-5"> <p class="text-xs sm:text-sm"><span class="font-medium text-dark-gray">{{ \App\Models\OrderItem::where('product_id', $product->id)->count() }} Terjual</span></span> </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

{{-- services --}}
<div id="services" class="mt-16 lg:mt-20 flex flex-col mx-6 sm:mx-10 lg:mx-20 gap-8 items-center">
    <h1 class="font-semibold text-3xl sm:text-4xl text-center">Layanan yang dapat Membantumu</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8 w-full max-w-7xl"> <div class="flex flex-col rounded-xl bg-white shadow-lg overflow-hidden cursor-pointer group">
            <div class="flex flex-col gap-2 p-5 flex-1">
                <h5 class="text-xl sm:text-2xl font-medium">Online Payment Process</h5> <p class="text-sm text-gray-600">Memudahkan mu dalam melakukan pembayaran yang cepat dan
                    aman</p>
            </div>
            <div class="overflow-hidden">
                <img src="{{ asset('/assets/online-payment.png') }}" alt="Online Payment"
                     class="w-full h-40 sm:h-48 object-cover transition-transform duration-300 group-hover:scale-110"> </div>
        </div>
        <div class="flex flex-col rounded-xl bg-white shadow-lg overflow-hidden cursor-pointer group">
            <div class="flex flex-col gap-2 p-5 flex-1">
                <h5 class="text-xl sm:text-2xl font-medium">Pengiriman Terpercaya</h5>
                <p class="text-sm text-gray-600">Memastikan barang dikirim dengan cepat melalui jasa pengiriman
                    terpercaya.</p>
            </div>
            <div class="overflow-hidden">
                <img src="{{ asset('/assets/delivery.png') }}" alt="Pengiriman"
                     class="w-full h-40 sm:h-48 object-cover transition-transform duration-300 group-hover:scale-110">
            </div>
        </div>
        <div class="flex flex-col rounded-xl bg-white shadow-lg overflow-hidden cursor-pointer group">
            <div class="flex flex-col gap-2 p-5 flex-1">
                <h5 class="text-xl sm:text-2xl font-medium">Keakuratan Data Barang</h5>
                <p class="text-sm text-gray-600">Memastikan bahwa setiap produk selalu menampilkan stok yang
                    akurat.</p>
            </div>
            <div class="overflow-hidden">
                <img src="{{ asset('/assets/faq.png') }}" alt="Data Akurat"
                     class="w-full h-40 sm:h-48 object-cover transition-transform duration-300 group-hover:scale-110">
            </div>
        </div>
    </div>
</div>

{{-- footer --}}
<footer class="mt-32 lg:mt-40 px-6 sm:px-10 lg:px-16 py-10 sm:py-12 bg-dark-gray flex flex-col gap-8"> <div class="flex flex-col lg:flex-row w-full gap-8 sm:gap-12 lg:gap-0 justify-between"> <div class="flex flex-col gap-4 text-white max-w-md">
            <a href="/" class="w-40 sm:w-48 lg:w-52"><img src="{{ asset('/assets/ic_logo.svg') }}" alt="logo"></a> <p class="text-sm">Arena Sport Warehouse adalah platform untuk belanja alat olahraga favoritmu
                dengan segala kemudahan fiturnya!</p>
            <div class="flex flex-row gap-2 items-start">
                <img src="{{ asset('/assets/ic_map-pin.svg') }}" alt="pin" class="size-5 sm:size-6 flex-shrink-0 mt-1">
                <a href="https://maps.app.goo.gl/kbCVaRrxX5KHXNie6" target="_blank"
                   class="text-xs sm:text-sm hover:underline"> Jl. Pemuda no 44, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah
                </a>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-8 sm:gap-16 lg:gap-48 text-white">
            <div class="flex flex-col gap-3">
                <h3 class="font-medium text-base sm:text-lg">Navigate</h3> <a href="#about" class="hover:underline text-sm">Tentang Kami</a>
                <a href="#products" class="hover:underline text-sm">Produk Kami</a>
                <a href="#services" class="hover:underline text-sm">Layanan</a>
            </div>
            <div class="flex flex-col gap-3">
                <h3 class="font-medium text-base sm:text-lg">Socials</h3>
                <div class="flex flex-row gap-2 items-center">
                    <img src="{{ asset('/assets/ic_instagram.svg') }}" alt="instagram" class="size-5">
                    <a href="/" class="hover:underline text-sm">@instagram</a>
                </div>
            </div>
        </div>
    </div>

    <span class="w-full bg-white h-[0.1px] opacity-50"></span>
    <p class="text-white text-xs sm:text-sm font-medium w-full text-center opacity-70"> @2025 Arena Sport Warehouse - All Rights Reserved
    </p>
</footer>

<script>
    // Simple mobile menu toggle (vanilla JS)
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');
    const close = document.getElementById('close-menu');
    const menuLinks = menu.querySelectorAll('a'); // Ambil semua link di menu

    btn.addEventListener('click', () => menu.classList.remove('hidden'));
    close.addEventListener('click', () => menu.classList.add('hidden'));
    menu.addEventListener('click', (e) => {
        if (e.target === menu) menu.classList.add('hidden');
    });

    // Tambahkan fungsionalitas untuk menutup menu saat link di klik (untuk navigasi)
    menuLinks.forEach(link => {
        link.addEventListener('click', () => {
            menu.classList.add('hidden');
        });
    });
</script>

</body>
</html>
