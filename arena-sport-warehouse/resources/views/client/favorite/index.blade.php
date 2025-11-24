@extends('client.profile.app')

@section('content')
    <header class="px-8 py-5 bg-white drop-shadow-lg drop-shadow-[#00000028]">
        <h1 class="font-semibold text-2xl">Favorite</h1>
    </header>

    <div class="m-10 flex flex-col gap-8">
        <table class="w-full table-fixed border-collapse">
            <thead>
            <tr class="bg-white rounded-tr-lg rounded-tl-lg drop-shadow-sm text-[#B6B6B6]">
                <th class="py-4 px-8 text-left">Image</th>
                <th class="py-4 text-left">Name</th>
                <th class="py-4 text-left">Category</th>
                <th class="py-4 text-left">Price</th>
                <th class="py-4 text-left">Stock</th>
                <th class="py-4 px-8 text-left">Action</th>
            </tr>
            </thead>
            <tbody>
            @if($favorites->isEmpty())
                <tr>
                    <td colspan="5">
                        <p class="text-gray-400 font-medium text-center py-6">Favorite kosong.</p>
                    </td>
                </tr>
            @else
                @foreach($favorites as $item)
                    <tr class="bg-white rounded-lg drop-shadow-lg">
                        <td class="py-4 px-8 align-middle">
                            <img src="{{ asset('/storage/' . $item->products->image_url) }}" alt="product image"
                                 class="w-20 rounded-md object-cover">
                        </td>
                        <td class="py-4 px-8 align-middle">
                            <div class="flex flex-col gap-1">
                                <h1 class="font-semibold hover:underline">{{ $item->products->name }}</h1>
                                <h5 class="text-sm text-[#B6B6B6] truncate max-w-64">{{ $item->products->description }}</h5>
                            </div>
                        </td>
                        <td class="py-4 px-8 align-middle">
                        <span
                            class="text-white font-medium bg-vibrant-orange px-3 py-2 text-sm rounded-md">{{ $item->products->categories->name }}</span>
                        </td>
                        <td class="py-4 px-8 align-middle">Rp{{ number_format($item->products->price, 0, ',', '.') }}</td>
                        <td class="py-4 px-8 align-middle">{{ $item->products->stock }}</td>
                        <td class="py-4 px-8 align-middle">
                            <form action="{{ route('favorite.remove', ['productId' => $item->products->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-[#E6E6E6] px-3 py-1 rounded-lg hover:bg-gray-300 transition duration-200">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
