<div class="relative hover:shadow-lg transition duration-200 rounded-xl overflow-hidden w-fit hover:opacity-90">
    <a href="/products/slug" class="flex flex-col justify-center items-start">
        <div class="relative flex justify-end">
            <img src="{{ asset($imageUrl) }}" alt="Raket Yonex terbaru" class="self-start w-72 h-64 object-cover">
        </div>
        <div class="flex flex-col gap-2 p-3">
            <h1 class="text-2xl font-medium hover:opacity-90 transition duration-200">{{ $name }}</h1>
            <p class="text-sm">{{ $description }}</p>
            <p class="font-semibold">Rp{{ number_format($price) }}</p>
            <p>⭐ {{ $rate }}/5.0 ({{ $reviews }} Ulasan)</p>
        </div>
    </a>

    <!-- Tombol favorit: tetap di posisi semula, tapi di luar <a> -->
    <a href="javascript:void(0)" onclick="event.stopPropagation(); " class="absolute top-0 right-0 p-2 bg-white rounded-full m-4 hover:bg-slate-100 transition duration-200 z-10">
        <img src="{{ asset('/assets/favourite.svg') }}" alt="favorit" class="size-5">
    </a>
</div>
