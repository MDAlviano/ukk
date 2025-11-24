@if($products->isEmpty())
    <div class="col-span-4 px-20 py-24 flex flex-col items-center gap-3">
        <img src="{{ asset('/assets/ic_box-gray.svg') }}" alt="box" class="opacity-80 w-12">
        <h1 class="font-medium text-dark-gray opacity-80">
            Produk tidak ditemukan untuk {{ request('search') ?? 'pencarian ini' }}.
        </h1>
    </div>
@else
    <div class="grid grid-cols-4 justify-between">
        @foreach($products as $product)
            <div class="hover:shadow-lg my-4 transition duration-200 rounded-xl overflow-hidden w-fit hover:opacity-90 group">
                <a href="{{ route('products.show', $product->slug) }}" class="flex flex-col justify-center items-start">
                    <div class="relative flex justify-end overflow-hidden">
                        <img src="{{ asset('/storage/' . $product->image_url) }}"
                             alt="{{ $product->name }}"
                             class="self-start w-72 h-64 object-cover transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="flex flex-col gap-2 p-3">
                        <h1 class="text-2xl font-medium hover:opacity-90 transition duration-200">{{ $product->name }}</h1>
                        <p class="text-sm truncate">{{ $product->description }}</p>
                        <p class="font-semibold">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                        <div class="flex flex-row gap-1 items-center">
                            <img src="{{ asset('/assets/ic_bag.svg') }}" alt="star" class="size-5">
                            <p><span class="font-medium text-dark-gray">
                                {{ \App\Models\OrderItem::where('product_id', $product->id)->sum('quantity') }} Terjual
                            </span></p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endif
