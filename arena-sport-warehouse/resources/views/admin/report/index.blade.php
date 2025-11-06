@extends('admin.app')

@section('content')
    <header class="px-8 py-5 bg-white drop-shadow-lg drop-shadow-[#00000028]">
        <h1 class="font-semibold text-2xl">Reports</h1>
    </header>

    <div class="flex flex-row justify-between gap-8 m-10">
        {{-- first section --}}
        <div class="w-fit rounded-lg p-8 flex flex-col gap-4 shadow-md">
            <div class="flex flex-row gap-2">
                <img src="{{ asset('/assets/Calendar.svg') }}" alt="calendar">
                <h1 class="text-2xl font-semibold">Today</h1>
            </div>
            <p class="opacity-75">Here are the details of today revenue & orders.</p>
            <span class="w-full h-[1px] bg-dark-gray opacity-50"></span>
            {{-- total revenue --}}
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
            {{-- total orders --}}
            <div class="flex flex-col gap-4">
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

        {{-- second section --}}
        <div class="w-full flex flex-col gap-7">
            <div class="rounded-lg p-8 flex flex-col gap-4 shadow-md">
                <select name="" id="" class="w-1/3 text-2xl font-semibold">
                    <option value="">September</option>
                </select>
                <p class="opacity-75">Here are the details of this month revenue & orders.</p>
                <span class="w-full h-[1px] bg-dark-gray opacity-50"></span>
                {{-- total revenue --}}
                <div class="flex flex-row gap-2">
                    <img src="{{ asset('/assets/Dollar.svg') }}" alt="dollar"
                         class="bg-vibrant-orange p-3 rounded-full">
                    <div class="flex flex-col font-semibold">
                        <h1 class="text-xl opacity-80">Total Revenue</h1>
                        <h5 class="text-2xl">Rp 1.200.000</h5>
                    </div>
                </div>
                {{-- total orders --}}
                <div class="flex flex-row gap-2">
                    <img src="{{ asset('/assets/shopping-cart-white.svg') }}" alt="dollar"
                         class="bg-vibrant-orange p-3 rounded-full">
                    <div class="flex flex-col font-semibold">
                        <h1 class="text-xl opacity-80">Total Orders</h1>
                        <h5 class="text-2xl">150</h5>
                    </div>
                </div>
            </div>
            <div class="rounded-lg p-8 flex flex-col gap-4 shadow-md">
                <h1 class="text-2xl font-semibold">Export to CSV</h1>
                <button class="w-full py-2 rounded-lg bg-vibrant-orange text-white font-medium text-center hover:opacity-80 transition duration-200">Export Today Report to CSV</button>
                <button class="w-full py-2 rounded-lg bg-vibrant-orange text-white font-medium text-center hover:opacity-80 transition duration-200">Export Selected Month Report to CSV</button>
            </div>
        </div>
    </div>

@endsection
