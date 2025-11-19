@extends('admin.app')

@section('content')
    <header class="px-8 py-5 bg-white drop-shadow-lg drop-shadow-[#00000028]">
        <h1 class="font-semibold text-2xl">Products of Badminton Collection</h1>
    </header>

    <div class="m-10 flex flex-col gap-8">
        {{-- filter --}}
        <div class="w-full flex flex-row justify-between">
            <div class="flex flex-col gap-1">
                <h1 class="text-lg font-semibold">Filter:</h1>
                <div class="flex flex-row gap-3">
                    <div class="flex flex-row gap-4 px-3 py-2 rounded-md outline-1">
                        <input type="text" placeholder="Search..." class="text-[#B6B6B6] focus:outline-0">
                        <img src="{{ asset('/assets/Search.svg') }}" alt="">
                    </div>
                    <select name="" id=""
                            class="flex flex-row gap-4 px-3 py-2 rounded-md outline-1 focus:outline-0">
                        <option value="">Harga</option>
                    </select>
                    <select name="" id=""
                            class="flex flex-row gap-4 px-3 py-2 rounded-md outline-1 focus:outline-0">
                        <option value="">Rating</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-col gap-1">
                <h1 class="text-lg font-semibold">Sort:</h1>
                <select name="" id=""
                        class="flex flex-row gap-4 px-3 py-2 rounded-md outline-1 focus:outline-0">
                    <option value="">A-Z</option>
                </select>
            </div>
        </div>

        <table class="w-full table-fixed border-collapse">
            <thead>
            <tr class="bg-white rounded-tr-lg rounded-tl-lg drop-shadow-sm text-[#B6B6B6]">
                <th class="py-4 px-8 text-left">Image</th>
                <th class="py-4 px-8 text-left">Name</th>
                <th class="py-4 px-8 text-left">Price</th>
                <th class="py-4 px-8 text-left">Stock</th>
                <th class="py-4 px-8 text-left">Orders</th>
                <th class="py-4 px-8 text-left">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr class="bg-white rounded-lg drop-shadow-lg">
                <td class="py-4 px-8 align-middle">
                    <img src="{{ asset($imageUrl) }}" alt="product image" class="w-20 rounded-md object-cover">
                </td>
                <td class="py-4 px-8 align-middle">
                    <div class="flex flex-col gap-1">
                        <h1 class="font-semibold">{{ $uniqueId }}</h1>
                        <h1 class="font-semibold hover:underline"><a href="/admin/products/slug">{{ $title }}</a></h1>
                        <h5 class="text-sm text-[#B6B6B6] truncate max-w-64">{{ $description }}</h5>
                    </div>
                </td>
                <td class="py-4 px-8 align-middle">Rp {{ number_format($price) }}</td>
                <td class="py-4 px-8 align-middle">{{ $stock }}</td>
                <td class="py-4 px-8 align-middle">{{ $orders }}</td>
                <td class="py-4 px-8 align-middle">
                    <div class="flex gap-3">
                        <a href="/admin/products/update" class="bg-[#E6E6E6] px-3 py-1 rounded-lg hover:bg-gray-300 transition duration-200">Edit</a>
                        <a href="" class="bg-[#E6E6E6] px-3 py-1 rounded-lg hover:bg-gray-300 transition duration-200">Delete</a>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
@endsection
