<footer class="px-16 py-12 bg-dark-gray flex flex-col gap-8">
    <div class="flex flex-row w-full justify-between">
        <div class="flex flex-col gap-3 w-1/4 text-white">
            <a href="/home" class="w-52 -ml-4"><img src="{{ asset('/assets/ic_logo.svg') }}" alt="logo"></a>
            <h1 class="text-xl font-bold text-vibrant-orange"></h1>
            <p class="text-sm">Arena Sport Warehouse adalah platform untuk belanja alat olahraga favoritmu dengan segala
                kemudahan fiturnya!</p>
            <div class="flex flex-row gap-2 items-center">
                <img src="{{ asset('/assets/ic_map-pin.svg') }}" alt="pin" class="size-6">
                <a href="https://maps.app.goo.gl/kbCVaRrxX5KHXNie6" target="_blank" class="text-sm hover:underline">Jl.
                    Pemuda no 44, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah</a>
            </div>
        </div>
        <div class="flex flex-row gap-48 text-white">
            <div class="flex flex-col gap-2">
                <h3 class="font-medium">Navigate</h3>
                <a href="/home" class="hover:underline text-sm">Home</a>
                <a href="/categories" class="hover:underline text-sm">Categories</a>
                <a href="/products" class="hover:underline text-sm">Products</a>
            </div>
            <div class="flex flex-col gap-2">
                <h3 class="font-medium">Socials</h3>
                <div class="flex flex-row gap-2 items-center">
                    <img src="{{ asset('/assets/ic_instagram.svg') }}" alt="instagram" class="size-5">
                    <a href="/" class="hover:underline text-sm">@instagram</a>
                </div>
            </div>
        </div>
    </div>
    <span class="w-full bg-white h-[0.1px] opacity-50"></span>
    <p class="text-white text-sm font-medium w-full text-center opacity-70">@2025 Arena Sport Warehouse - All Rights
        Reserved</p>
</footer>
