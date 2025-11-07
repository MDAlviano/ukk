@extends('admin.app')

@section('content')
    <header class="px-8 py-5 bg-white drop-shadow-lg drop-shadow-[#00000028]">
        <h1 class="font-semibold text-2xl">Orders</h1>
    </header>

    <div class="m-10 flex flex-col gap-8">
        {{-- filter --}}
        <div class="flex flex-row gap-6">
            <div class="flex flex-row gap-4 px-3 py-2 rounded-md outline-1 outline-dark-gray">
                <h5>Select Date</h5>
                <input type="date" class="outline-none focus:outline-none">
            </div>
            <select name="" id="" class="flex flex-row gap-4 pl-3 pr-8 py-2 rounded-md outline-1">
                <option value="">Category</option>
            </select>
            <select name="" id="" class="flex flex-row gap-4 pl-3 pr-8 py-2 rounded-md outline-1">
                <option value="">Status</option>
            </select>
        </div>

        {{-- list orders --}}
        <div class="flex flex-col gap-4">
            {{-- order item --}}
            <x-admin-order-card
                id="#A1234"
                date="07 Nov"
                time="11:09"
                name="John Doe"
                email="johndoe@gmail.com"
                price=150000
                status="Pending"
            />
            <x-admin-order-card
                id="#A1234"
                date="07 Nov"
                time="11:09"
                name="John Doe"
                email="johndoe@gmail.com"
                price=150000
                status="Pending"
            />
        </div>
    </div>

@endsection
