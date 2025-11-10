<div class="hover:shadow-lg transition duration-200 rounded-xl overflow-hidden w-fit hover:opacity-90">
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
</div>
