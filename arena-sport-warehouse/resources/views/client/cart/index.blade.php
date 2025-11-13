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
                <h1 class="text-3xl font-semibold">Rp29.000</h1>
            </div>
            <div class="flex flex-col gap-2">
                <h1 class="text-lg font-semibold">Action:</h1>
                <div class="flex flex-row gap-2">
                    <button type="submit" class="text-white bg-vibrant-orange rounded-md px-4 py-2 hover:opacity-80 transition duration-200 cursor-pointer">Clear All</button>
                    <a href="/order/create" class="text-white bg-vibrant-orange rounded-md px-4 py-2 hover:opacity-80 transition duration-200 cursor-pointer">Checkout</a>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <div class="w-full h-fit flex flex-row bg-white rounded-tr-lg rounded-tl-lg drop-shadow-sm py-4 px-8 gap-3 text-[#B6B6B6]">
                <h5>Image</h5>
                <h5 class="ml-16">Name</h5>
                <h5 class="ml-62">Category</h5>
                <h5 class="ml-16">Price</h5>
                <h5 class="ml-16">Stock</h5>
                <h5 class="ml-8">Rating</h5>
                <h5 class="ml-18">Action</h5>
            </div>
            {{-- item --}}
            <x-cart-card
                imageUrl="/assets/placeholder.png"
                title="Yonex Racket 2247 C-Tier Series"
                description="This is Yonex Racket 2247 C-Tier Series is the good racket in badminton"
                category="Badminton"
                price=200000
                quantity=10
                rating=4.2
                reviews=182
            />
            <x-cart-card
                imageUrl="/assets/placeholder.png"
                title="Yonex Racket 2247 C-Tier Series"
                description="This is Yonex Racket 2247 C-Tier Series is the good racket in badminton"
                category="Badminton"
                price=200000
                quantity=10
                rating=4.2
                reviews=182
            />
        </div>
    </div>
@endsection
