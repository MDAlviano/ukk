@extends('admin.app')

@section('content')
    <div class="flex flex-col gap-5 m-10">
        {{-- 1st section --}}
        <div class="w-full rounded-lg p-8 flex flex-col gap-4 shadow-md">
            <div class="flex flex-row gap-2 items-center">
                <img src="{{ asset('/assets/Calendar.svg') }}" alt="calendar" class="w-10">
                <h1 class="font-semibold text-3xl">{{ $date }}</h1>
            </div>
            <span class="w-full h-[1px] bg-dark-gray opacity-50"></span>
            <h1 class="font-semibold text-2xl">👋 Halo,</h1>
            <h1 class="font-bold text-4xl">{{ $user->full_name }}</h1>
        </div>

        {{-- 2nd section --}}
        <div class="w-full rounded-lg p-8 flex flex-col gap-4 shadow-md">
            <div class="flex flex-row gap-2">
                <img src="{{ asset('/assets/Calendar.svg') }}" alt="calendar">
                <h1 class="text-2xl font-semibold">Hari ini</h1>
            </div>
            <p class="opacity-75">Ini adalah total pemasukan dan beberapa pesanan di hari ini.</p>
            <span class="w-full h-[1px] bg-dark-gray opacity-50"></span>
            <div class="flex flex-row gap-4">
                <div class="flex flex-col font-semibold">
                    <h1 class="text-xl opacity-80">Total Pemasukan</h1>
                    <h5 class="text-2xl">Rp{{ number_format($totalRevenue, 0, ',', '.') }}</h5>
                </div>
                <div class="flex flex-col font-semibold">
                    <h1 class="text-xl opacity-80">Total Order</h1>
                    <h5 class="text-2xl">{{ $totalOrders }}</h5>
                </div>
            </div>
            <span class="w-full h-[1px] bg-dark-gray opacity-50"></span>
            <h1 class="text-2xl font-semibold">Orders</h1>
            {{-- orders --}}
            @if($orders->isEmpty())
                <p class="w-full text-gray-400 font-medium">Belum ada order</p>
            @else
                <div class="flex flex-col gap-2">
                    {{-- item --}}
                    @foreach($orders as $order)
                        <div class="p-3 flex-col gap-1 shadow-sm rounded-md">
                            <a href="/" class="font-medium opacity-50">{{ $order->order_number }} - {{ $order->status }}</a>
                            <div class="flex flex-row justify-between w-full font-semibold">
                                <p>{{ $order->users->full_name }}</p>
                                <p>Rp{{ number_format($order->final_price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    @if(session('success'))
        <script>
            alert(' {{ session('success') }}');
        </script>
    @else
        <script>
            alert(' {{ session('error') }}');
        </script>
    @endif
@endsection
