@extends('client.profile.app')

@section('content')
    <header class="px-8 py-5 bg-white shadow-md drop-shadow-[#00000028]">
        <h1 class="font-semibold text-2xl">Orders</h1>
    </header>

    <div class="m-10 flex flex-col gap-8">
        {{-- filter --}}
        <form method="GET" class="flex flex-row gap-6 items-end">
            <div class="flex flex-col gap-2">
                <label class="text-sm font-medium text-gray-600">Pilih Tanggal</label>
                <input type="date" name="date" value="{{ request('date') }}"
                       class="px-4 py-2.5 rounded-lg border border-gray-300 focus:outline-1" onchange="this.form.submit()">
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-sm font-medium text-gray-600">Status Pesanan</label>
                <select name="status" class="px-4 py-2.5 rounded-lg border focus:outline-1" onchange="this.form.submit()">
                    @foreach($availableStatuses as $value => $label)
                        <option value="{{ $value }}"
                            {{ request('status', 'all') == $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        {{-- list orders --}}
        @if($orders->isEmpty())
            <p class="w-full text-center font-medium text-gray-400 py-6">Order masih kosong</p>
        @else
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
                                <h5 class="text-sm text-[#B6B6B6]">{{ $order->created_at->format('H:i') }}</h5>
                            </div>
                            <h5 class="text-right">Rp{{ number_format($order->final_price, 0, ',', '.') }}</h5>
                            <h5 class="text-center"><i>{{ $order->status }}</i></h5>
                        </div>
                        <span class="bg-[#B6B6B6] opacity-70 w-full h-[1px]"></span>
                        <a href="{{ route('profile.orders.show', ['orderNumber' => $order->order_number]) }}" class="text-[#B6B6B6] hover:underline">Details...</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
