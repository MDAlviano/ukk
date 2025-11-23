@foreach($categories as $category)
    <tr class="bg-white rounded-lg drop-shadow-lg">
        <td class="py-4 px-8 align-middle">
            <div class="flex items-center gap-6">
                <img src="{{ asset('/storage/' . $category->image_url) }}" alt="{{ $category->name }}"
                     class="size-24 rounded-md object-cover">
            </div>
        </td>
        <td class="py-4 align-middle">
            <h5 class="font-semibold hover:underline"><a
                    href="{{ route('admin.categories.show', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
            </h5>
        </td>
        <td class="py-4 align-middle font-semibold">{{ $category->products->count() }} Products</td>
        <td class="py-4 px-8 align-middle">
            <div class="flex gap-3">
                <a href="{{ route('admin.category.edit', ['slug' => $category->slug]) }}"
                   class="bg-[#E6E6E6] px-3 py-1 rounded-lg hover:bg-gray-300 transition duration-200">Edit</a>
                <form action="{{ route('category.delete', ['id' => $category->id]) }}"
                      method="POST" onsubmit="return confirm('Apakah anda yakin menghapus kategori {{ $category->name }}?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-[#E6E6E6] px-3 py-1 rounded-lg hover:bg-gray-300 transition duration-200">Delete</button>
                </form>
            </div>
        </td>
    </tr>
@endforeach

@if($categories->isEmpty())
    <tr>
        <td colspan="6" class="text-center py-16 text-gray-500 text-lg">
            @if(request('q'))
                Kategori "{{ request('q') }}" tidak ditemukan
            @else
                Belum ada kategori
            @endif
        </td>
    </tr>
@endif
