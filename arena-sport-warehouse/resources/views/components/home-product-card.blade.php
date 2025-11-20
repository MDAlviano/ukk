<div class="hover:shadow-lg transition duration-200 rounded-xl overflow-hidden w-fit hover:opacity-90 group">
    <a href="/products/slug" class="flex flex-col justify-center items-start">
        <div class="relative flex justify-end overflow-hidden">
            <img src="{{ asset($imageUrl) }}" alt="Raket Yonex terbaru" class="self-start w-72 h-64 object-cover transition-transform duration-300 group-hover:scale-110">
        </div>
        <div class="flex flex-col gap-2 p-3">
            <h1 class="text-2xl font-medium hover:opacity-90 transition duration-200">{{ $name }}</h1>
            <p class="text-sm truncate">{{ $description }}</p>
            <p class="font-semibold">Rp{{ number_format($price) }}</p>
            <div class="flex flex-row gap-1 items-center">
                <img src="{{ asset('/assets/ic_bag.svg') }}" alt="star" class="size-5">
                <p><span class="font-medium text-dark-gray">{{ \App\Models\OrderItem::where('product_id', $id) }} Terjual</p>
            </div>
        </div>
    </a>
</div>
