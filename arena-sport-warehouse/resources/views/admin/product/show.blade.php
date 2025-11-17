@extends('admin.app')

@section('content')
    <header class="px-8 py-5 bg-white drop-shadow-lg drop-shadow-[#00000028]">
        <h1 class="font-semibold text-2xl">Product Detail</h1>
    </header>

    <div class="flex flex-col justify-between gap-12 m-12 overflow-auto">
        <div class="flex flex-row justify-between gap-8">
            {{-- product data --}}
            <div class="flex flex-col gap-5">
                <h1 class="font-semibold text-3xl">Yonex Racket 2247 C-Tier Series</h1>
                <div class="flex flex-row gap-3 items-center">
                    <h5 class="py-1 px-3 rounded-md bg-vibrant-orange text-white hover:drop-shadow-md transition duration-200">Badminton</h5>
                    <h5 class="font-semibold text-lg">#A1234</h5>
                </div>
                <div class="flex flex-col gap-2">
                    <h1 class="font-semibold">Deskripsi:</h1>
                    <p>Ini adalah Yonex Racket 2247 C-Tier Series yang sangat bagus dan cocok dibeli
                        untuk para pemain badminton. Harganya yang sangat terjangkau dan juga sangat nyaman digunakan untuk
                        para pemain badminton. </p>
                </div>
                <div class="flex flex-col gap-2">
                    <h1 class="font-semibold">Informasi Produk:</h1>
                    <ul class="space-y-1">
                        <li>Harga : Rp{{ number_format(200000) }}</li>
                        <li>Stok : {{ number_format(10) }}</li>
                        <li>Terjual : {{ number_format(128) }}</li>
                    </ul>
                </div>
            </div>

            {{-- product image --}}
            <img src="{{ asset('/assets/placeholder.png') }}" alt="product image" class="w-full h-96 object-cover">
        </div>
    </div>
@endsection
