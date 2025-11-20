@extends('client.profile.app')

@section('content')
    <header class="px-8 py-5 bg-white drop-shadow-lg drop-shadow-[#00000028]">
        <h1 class="font-semibold text-2xl">Cart</h1>
    </header>

    <div class="m-10 flex flex-col gap-8">
        {{-- information --}}
        <div class="flex flex-row gap-4 items-center">
            <div class="flex flex-col gap-2">
                <h1 class="text-lg font-semibold">Total:</h1>
                <h1 class="text-3xl font-semibold">Rp{{ number_format($totalPrice, 0, ',', '.') }}h1>
            </div>
            <div class="flex flex-col gap-2">
                <h1 class="text-lg font-semibold">Action:</h1>
                <div class="flex flex-row gap-2">
                    <a href=""
                       class="text-white bg-vibrant-orange rounded-md px-4 py-2 hover:opacity-80 transition duration-200 cursor-pointer">Checkout</a>
                </div>
            </div>
        </div>

        <table class="w-full table-fixed border-collapse">
            <thead>
            <tr class="bg-white rounded-tr-lg rounded-tl-lg drop-shadow-sm text-[#B6B6B6]">
                <th class="py-4 px-8 text-left">Image</th>
                <th class="py-4 px-8 text-left">Name</th>
                <th class="py-4 px-8 text-left">Category</th>
                <th class="py-4 px-8 text-left">Price</th>
                <th class="py-4 px-8 text-left">Quantity</th>
                <th class="py-4 px-8 text-left">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($carts as $item)
                <tr class="bg-white rounded-lg drop-shadow-lg">
                    <td class="py-4 px-8 align-middle">
                        <img src="{{ asset($item->products->image_url) }}" alt="product image" class="w-20 rounded-md object-cover">
                    </td>
                    <td class="py-4 px-8 align-middle">
                        <div class="flex flex-col gap-1">
                            <h1 class="font-semibold hover:underline">{{ $item->products->name }}</h1>
                            <h5 class="text-sm text-[#B6B6B6] font-normal truncate max-w-64">{{ $item->products->description }}</h5>
                        </div>
                    </td>
                    <td class="py-4 px-8 align-middle">
                    <span
                        class="text-white font-medium bg-vibrant-orange px-3 py-2 text-sm rounded-md">{{ $item->products->categories->name }}</span>
                    </td>
                    <td class="py-4 px-8 align-middle">Rp{{ number_format($item->products->price, 0, ',', '.') }}</td>
                    <td class="py-4 px-8 align-middle">{{ $item->quantity }}</td>
                    <td class="py-4 px-8 align-middle">
                        <div class="flex gap-3">
                            <a href="{{ route('cart.remove', ['productId' => $item->products->id]) }}"
                               class="bg-[#E6E6E6] px-3 py-1 rounded-lg hover:bg-gray-300 transition duration-200">Remove</a>
                            <a href="" class="bg-[#E6E6E6] px-3 py-1 rounded-lg hover:bg-gray-300 transition duration-200">Buy</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @if(session('success'))
        <script>
            alert(session('success'));
        </script>
    @else
        <script>
            alert(session('error'));
        </script>
    @endif
@endsection
