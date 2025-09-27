@extends('admin.app')

@section('content')
    <div class="flex flex-row justify-between gap-8 m-10">
        {{-- 1st section --}}
        <div class="w-fit rounded-lg p-8 flex flex-col gap-4 shadow-md">
            <div class="flex flex-row gap-2">
                <img src="{{ asset('/assets/Calendar.svg') }}" alt="calendar">
                <h1 class="text-2xl font-semibold">Today</h1>
            </div>
            <p class="opacity-75">Here are the details of today revenue & orders.</p>
            <span class="w-full h-[1px] bg-dark-gray opacity-50"></span>
            <div class="flex flex-row gap-4">
                <img src="{{ asset('/assets/Dollar.svg') }}" alt="dollar"
                     class="bg-vibrant-orange p-3 rounded-full">
                <div class="flex flex-col font-semibold">
                    <h1 class="text-xl opacity-80">Total Revenue</h1>
                    <h5 class="text-2xl">Rp 1.200.000</h5>
                </div>
            </div>
            <span class="w-full h-[1px] bg-dark-gray opacity-50"></span>
            <h1 class="text-2xl font-semibold">Orders</h1>
            {{-- orders --}}
            <div class="flex flex-col gap-2">
                {{-- item --}}
                <div class="p-3 flex-col gap-1 shadow-sm rounded-md">
                    <a href="/" class="font-medium opacity-50">#12A23 - Pending</a>
                    <div class="flex flex-row justify-between w-full font-semibold">
                        <p>Detryalviano</p>
                        <p>Rp600.000</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- 2nd section --}}
        <div class="w-full rounded-lg p-8 flex flex-col gap-6 shadow-md">
            <div class="flex flex-col gap-4">
                <div class="w-full flex flex-row justify-between">
                    <h1 class="text-2xl font-semibold">My Products</h1>
                    <a href="/admin/products" class="text-lg opacity-60 hover:opacity-45 transition duration-200">more</a>
                </div>
                {{-- 3 products --}}
                <div class="flex flex-col gap-2">
                    {{-- item --}}
                    <div class="p-3 flex-col gap-1 shadow-sm rounded-md">
                        <h4 class="font-medium opacity-50">Badminton</h4>
                        <div class="flex flex-row justify-between w-full font-semibold">
                            <a>Raket Yonex</a>
                            <p>Rp600.000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <div class="w-full flex flex-row justify-between">
                    <h1 class="text-2xl font-semibold">My Categories</h1>
                    <a href="/admin/categories" class="text-lg opacity-60 hover:opacity-45 transition duration-200">more</a>
                </div>
                {{-- 3 categories --}}
                <div class="flex flex-col gap-2">
                    {{-- item --}}
                    <div class="p-3 flex-row justify-between w-full font-semibold shadow-sm rounded-md">
                        <a href="/categories">Badminton</a>
                        <p>10 Products</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
