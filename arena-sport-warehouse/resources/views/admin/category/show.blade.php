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

        <div class="flex flex-col gap-2">
            <div
                class="w-full h-fit flex flex-row bg-white rounded-tr-lg rounded-tl-lg drop-shadow-sm py-4 px-8 gap-3 text-[#B6B6B6]">
                <h5>Image</h5>
                <h5 class="ml-12">Name</h5>
                <h5 class="ml-72">Price</h5>
                <h5 class="ml-24">Stock</h5>
                <h5 class="ml-18">Rating</h5>
                <h5 class="ml-32">Action</h5>
            </div>
            <div class="w-full h-fit flex flex-row justify-between bg-white rounded-lg drop-shadow-lg py-4 px-8 gap-3">
                <div class="flex flex-row gap-6">
                    <img src="{{ asset('/assets/placeholder.png') }}" alt="product image" class="w-20 rounded-md">
                    <div class="w-fit h-fit flex flex-col gap-1 my-auto">
                        <h1 class="font-semibold">#A1234</h1>
                        <h1 class="font-semibold hover:underline"><a href="/admin/products/slug">Yonex Racket 2247 C-Tier Series</a></h1>
                        <h5 class="text-sm text-[#B6B6B6] font-normal">This is Yonex Racket 2247 C-Tier Series...</h5>
                    </div>
                </div>
                <h5 class="my-auto">Rp200.000</h5>
                <h5 class="my-auto">10</h5>
                <h5 class="my-auto">4.8 / 5 (182)</h5>
                <div class="flex flex-row w-fit h-fit gap-3 my-auto">
                    <a href="/admin/products/update"
                       class="bg-[#E6E6E6] px-3 py-1 rounded-lg hover:bg-gray-300 transition duration-200">Edit</a>
                    <a href="" class="bg-[#E6E6E6] px-3 py-1 rounded-lg hover:bg-gray-300 transition duration-200">Delete</a>
                </div>
            </div>
        </div>

    </div>
@endsection
