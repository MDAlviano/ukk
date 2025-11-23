@foreach($products as $product)
    <tr class="bg-white rounded-lg drop-shadow-lg">
        <td class="py-4 px-8 align-middle">
            <img src="{{ asset('/storage/' . $product->image_url) }}" alt="{{ $product->name }}"
                 class="w-20 rounded-md object-cover">
        </td>
        <td class="py-4 align-middle">
            <div class="flex flex-col gap-1">
                <h1 class="font-semibold hover:underline"><a
                        href="{{ route('admin.products.show', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                </h1>
                <h5 class="text-sm text-[#B6B6B6] truncate max-w-64">{{ $product->description }}</h5>
            </div>
        </td>
        <td class="py-4 align-middle">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
        <td class="py-4 align-middle">{{ $product->stock }}</td>
        <td class="py-4 align-middle">{{ \App\Models\OrderItem::where('product_id', $product->id)->count() }}</td>
        <td class="py-4 align-middle">
            <div class="flex gap-3">
                <a href="{{ route('admin.products.edit', ['slug' => $product->slug]) }}"
                   class="bg-[#E6E6E6] px-3 py-1 rounded-lg hover:bg-gray-300 transition duration-200">Edit</a>
                <form action="{{ route('products.delete', ['id' => $product->id]) }}"
                      method="POST" onsubmit="return confirm('Apakah anda yakin untuk menghapus produk {{ $product->name }}?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-[#E6E6E6] px-3 py-1 rounded-lg hover:bg-gray-300 transition duration-200">Delete</button>
                </form>
            </div>
        </td>
    </tr>
@endforeach

@if($products->isEmpty())
    <tr>
        <td colspan="6" class="text-center py-16 text-gray-500 text-lg">
            @if(request('q'))
                Produk "{{ request('q') }}" tidak ditemukan
            @else
                Belum ada produk
            @endif
        </td>
    </tr>
@endif
