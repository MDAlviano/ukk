<footer class="px-16 py-12 bg-dark-gray flex flex-col gap-8">
    <div class="flex flex-row w-full justify-between">
        <div class="flex flex-col gap-6 w-1/4 text-white">
            <h1 class="text-2xl font-bold text-vibrant-orange">Arena Sport Warehouse</h1>
            <p class="font-medium">Arena Sport Warehouse adalah platform untuk belanja alat olahraga favoritmu dengan segala kemudahan fiturnya!</p>
            <div class="flex flex-row gap-2 items-center">
                <img src="{{ asset('/assets/ic_map-pin.svg') }}" alt="pin" class="size-6">
                <a href="https://maps.app.goo.gl/kbCVaRrxX5KHXNie6" target="_blank" class="text-sm hover:underline">Jl. Pemuda no 44, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah</a>
            </div>
        </div>
        <div class="flex flex-row gap-52 text-white">
            <div class="flex flex-col gap-2">
                <h3 class="font-medium text-lg">Navigate</h3>
                <a href="/home" class="hover:underline">Home</a>
                <a href="/categories" class="hover:underline">Categories</a>
                <a href="/products" class="hover:underline">Products</a>
                <a href="/about" class="hover:underline">About</a>
            </div>
            <div class="flex flex-col gap-2">
                <h3 class="font-medium text-lg">Socials</h3>
                <div class="flex flex-row gap-2">
                    <img src="{{ asset('/assets/ic_instagram.svg') }}" alt="instagram">
                    <a href="/" class="hover:underline">@instagram</a>
                </div>
            </div>
        </div>
    </div>
    <span class="w-full bg-white h-[0.1px] opacity-50"></span>
    <p class="text-white font-medium">@2025 Arena Sport Warehouse - All Rights Reserved</p>
</footer>
