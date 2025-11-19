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
                <option value="">Status</option>
            </select>
        </div>

        {{-- list orders --}}
        <div class="flex flex-col gap-4">
            {{-- order item --}}
            @foreach($orders as $order)
                <x-admin-order-card
                    id="{{ $order->order_number }}"
                    date="{{ $order->created_at }}"
                    time="{{ $order->created_at }}"
                    name="{{ $order->users->full_name }}"
                    email="{{ $order->users->email }}"
                    price="{{ $order->total_price }}"
                    status="{{ $order->status }}"
                />
            @endforeach
        </div>
    </div>

@endsection
