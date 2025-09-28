@extends('admin.app')

@section('content')
    <header class="px-8 py-5 bg-white drop-shadow-lg drop-shadow-[#00000028]">
        <h1 class="font-semibold text-2xl">Product Detail</h1>
    </header>

    <div class="flex flex-col justify-between gap-7 m-10 overflow-auto">
        <div class="flex flex-row justify-between gap-6">
            {{-- product data --}}
            <div class="flex flex-col gap-7">
                <h1 class="font-semibold text-2xl">Yonex Racket 2247 C-Tier Series</h1>
                <p class="opacity-70">Ini adalah Yonex Racket 2247 C-Tier Series yang sangat bagus dan cocok dibeli
                    untuk para pemain badminton. Harganya yang sangat terjangkau dan juga sangat nyaman digunakan untuk
                    para pemain badminton. </p>
                <div class="flex flex-col gap-2 opacity-70">
                    <p>Harga : Rp200.000</p>
                    <p>Stock : 10</p>
                </div>
                <div class="flex flex-row gap-4">
                    <h5 class="py-2 px-3 rounded-md bg-vibrant-orange text-white">Badminton</h5>
                    <p class="opacity6-70">4,6 / 5,0 (128 Orang)</p>
                </div>
            </div>

            {{-- product image --}}
            <img src="{{ asset('/assets/placeholder.png') }}" alt="product image" class="w-full h-fit">
        </div>

        <span class="w-full h-[1px] bg-dark-gray opacity-50"></span>

        <div class="flex flex-col gap-4">
            <h1 class="text-xl font-semibold">Reviews</h1>
            {{-- item --}}
            <div class="flex flex-col bg-white p-3 rounded-lg gap-3">
                <h1 class="font-semibold">Muhammad Hanif - 4,5 / 5</h1>
                <p class="opacity-70">Product nya bagus sekali, aku suka banget. Makanya aku kasih rating 4,5 dari 5.
                    Pas aku bawa buat main badminton bareng temen-temenku di atas rel kereta, enak banget rasanya. Kayak
                    powerful banget gitu lho. Temen-temenku sampe pada nanya beli dimana, yaudah deh kusaranin buat beli
                    di Toko Arena lewat web ini, gituuu. Jos deh mantep pokoknya!</p>
            </div>
        </div>
    </div>
@endsection
