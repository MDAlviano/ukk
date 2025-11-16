<div class="relative w-full h-64 rounded-xl overflow-hidden shadow-lg group my-3">
    <img src="{{ asset($imageUrl) }}" alt="{{ $name }}"
         class="absolute w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">

    <div class="absolute inset-0 flex flex-col justify-between p-6 text-white w-1/2 backdrop-blur-md">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="text-3xl font-bold drop-shadow-md">{{ $name }}</h3>
                <p class="text-lg drop-shadow">{{ $products }} products</p>
            </div>
        </div>

        <a href="/categories/slug" class="hover:opacity-80 transition duration-200">
            <div class="flex flex-row gap-2 items-center">
                <h1 class="text-xl">Jelajahi</h1>
                <img src="{{ asset('/assets/ic_chevron-right.svg') }}" alt="explore" class="size-7">
            </div>
        </a>
    </div>
</div>
