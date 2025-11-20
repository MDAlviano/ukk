@extends('client.profile.app')

@section('content')
    <header class="px-8 py-5 bg-white shadow-md drop-shadow-[#00000028]">
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
            @foreach($orders as $order)
                <div class="w-full h-fit bg-white rounded-lg drop-shadow-lg py-3 px-8 flex flex-col gap-3">
                    <div class="grid grid-cols-4 gap-x-8 text-[#B6B6B6]">
                        <h5>Id</h5>
                        <h5>Created</h5>
                        <h5 class="text-right">Total Price</h5>
                        <h5 class="text-center">Status Order</h5>
                    </div>
                    <span class="bg-[#B6B6B6] opacity-70 w-full h-[1px]"></span>
                    <div class="grid grid-cols-4 gap-x-8">
                        <h5>{{ $order->order_number }}</h5>
                        <div class="flex flex-col gap-1">
                            <h5>{{ $order->created_at->format('d M') }}</h5>
                            <h5 class="text-sm text-[#B6B6B6]">{{ $order->createdd_at->format('H:i') }}</h5>
                        </div>
                        <h5 class="text-right">Rp{{ number_format($order->total_price) }}</h5>
                        <h5 class="text-center"><i>{{ $order->status }}</i></h5>
                    </div>
                    <span class="bg-[#B6B6B6] opacity-70 w-full h-[1px]"></span>
                    <a href="{{ route('profile.orders.show', ['orderNumber' => $order->order_number]) }}" class="text-[#B6B6B6] hover:underline">Details...</a>
                </div>
            @endforeach
        </div>
    </div>

    @if(session('success'))
        <script>
            alert(session('success'));
        </script>
    @else
        <script>
            alert(session('error'));
        </script>
    @endif
@endsection
