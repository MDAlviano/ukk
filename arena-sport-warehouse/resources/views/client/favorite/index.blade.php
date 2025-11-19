@extends('client.profile.app')

@section('content')
    <header class="px-8 py-5 bg-white drop-shadow-lg drop-shadow-[#00000028]">
        <h1 class="font-semibold text-2xl">Favorite</h1>
    </header>

    <div class="m-10 flex flex-col gap-8">
        {{-- filter --}}
        <div class="w-full flex flex-row justify-between">
            <div class="flex flex-col gap-1">
                <h1 class="text-lg font-semibold">Filter:</h1>
                <div class="flex flex-row gap-4">
                    <div class="flex flex-row gap-4 px-3 py-2 rounded-md outline-1">
                        <input type="text" placeholder="Search..." class="text-[#B6B6B6] focus:outline-0">
                        <img src="{{ asset('/assets/Search.svg') }}" alt="">
                    </div>
                    <select name="" id=""
                            class="flex flex-row gap-4 px-3 py-2 rounded-md outline-1 focus:outline-0">
                        <option value="">Kategori</option>
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
                <h5 class="ml-16">Name</h5>
                <h5 class="ml-62">Category</h5>
                <h5 class="ml-16">Price</h5>
                <h5 class="ml-16">Stock</h5>
            </div>
            {{-- item --}}
            <x-favorite-card
                imageUrl="/assets/placeholder.png"
                title="Yonex Racket 2247 C-Tier Series"
                description="This is Yonex Racket 2247 C-Tier Series is the good racket in badminton"
                category="Badminton"
                price=200000
                stock=10
            />
            <x-favorite-card
                imageUrl="/assets/placeholder.png"
                title="Yonex Racket 2247 C-Tier Series"
                description="This is Yonex Racket 2247 C-Tier Series is the good racket in badminton"
                category="Badminton"
                price=200000
                stock=10
            />
        </div>
    </div>
@endsection
