@extends('client.profile.app')

@section('content')
    <div class="flex flex-col gap-10 m-10">
        {{-- top section --}}
        <div class="flex flex-col gap-5">
            <div class="flex flex-row gap-5">
                <h1 class="text-2xl font-semibold">Order Detail : {{ $order->order_number }}</h1>
                <h5 class="px-3 py-1 rounded-md outline-1 outline-vibrant-orange text-vibrant-orange bg-[#FFE2D7] italic">
                    {{ $order->status }}</h5>
            </div>
            <p class="text-lg">{{ $order->created_at->format('d F Y, H:i') }}</p>
        </div>

        {{-- main section --}}
        <div class="flex flex-row gap-5">
            {{-- left section --}}
            <div class="flex flex-col gap-5 w-full">
                {{-- customer info --}}
                <div class="flex flex-col outline-2 outline-gray-300 rounded-lg p-4 gap-3">
                    <h1 class="font-semibold text-lg">Customer</h1>
                    <div class="flex flex-row w-full justify-between">
                        <h4>Full Name</h4>
                        <p>{{ $order->users->full_name }}</p>
                    </div>
                    <div class="flex flex-row w-full justify-between">
                        <h4>Email</h4>
                        <p>{{ $order->users->email }}</p>
                    </div>
                    <div class="flex flex-row w-full justify-between">
                        <h4>Phone</h4>
                        <p>{{ $order->users->phone }}</p>
                    </div>
                </div>
                {{-- order items --}}
                <div class="flex flex-col outline-2 outline-gray-300 rounded-lg p-4 gap-4">
                    <h1 class="font-semibold text-lg">Order Items</h1>
                    {{-- item --}}
                    @foreach($order->orderItems as $item)
                        <div class="flex flex-row justify-between w-full">
                            <div class="flex flex-row gap-5">
                                <img src="{{ asset('/assets/placeholder.png') }}" alt="product image" class="size-20">
                                <div class="flex flex-col gap-3">
                                    <p class="opacity-70 text-dark-gray">{{ $item->products->categories->name }}</p>
                                    <p class="text-lg font-medium text-dark-gray">{{ $item->products->name }}</p>
                                </div>
                            </div>
                            <div class="flex flex-col gap-3 items-end">
                                <p class="text-dark-gray opacity-80">{{ $item->quantity }} x Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                                <p class="font-medium text-dark-gray">Rp{{ number_format($item->quantity * $item->price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- order summary --}}
                <div class="flex flex-col outline-2 outline-gray-300 rounded-lg p-4 gap-4">
                    <h1 class="font-semibold text-lg">Order Summary</h1>
                    <div class="flex flex-row w-full justify-between">
                        <h5>Subtotal</h5>
                        <p>{{ $order->orderItems->sum('quantity') }} item</p>
                        <p>Rp{{ number_format($order->orderItems->sum('price')) }}</p>
                    </div>
                    <div class="flex flex-row w-full justify-between">
                        <h5>Shipping</h5>
                        <p>Rp{{ number_format($order->shipments->price, 0, ',', '.') }}</p>
                    </div>
                    <span class="w-full h-[1px] border-[1px] border-gray-300"></span>
                    <div class="flex flex-row w-full justify-between">
                        <h5 class="font-medium">Total</h5>
                        <p>Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            {{-- right section --}}
            <div class="flex flex-col gap-5 w-3/6">
                {{-- address info --}}
                <div class="flex flex-col outline-2 outline-gray-300 rounded-lg p-4 gap-3">
                    <h1 class="font-semibold text-lg">Address</h1>
                    <div class="flex flex-row w-full justify-between">
                        <h4>Recipient Name</h4>
                        <p>{{ $order->shipments->addresses->recipient_name }}</p>
                    </div>
                    <div class="flex flex-row w-full justify-between">
                        <h4>Address</h4>
                        <p>{{ $order->shipments->addresses->address }}</p>
                    </div>
                    <div class="flex flex-row w-full justify-between">
                        <h4>City</h4>
                        <p>{{ $order->shipments->addresses->city }}</p>
                    </div>
                    <div class="flex flex-row w-full justify-between">
                        <h4>Province</h4>
                        <p>{{ $order->shipments->addresses->province }}</p>
                    </div>
                    <div class="flex flex-row w-full justify-between">
                        <h4>Country</h4>
                        <p>{{ $order->shipments->addresses->country }}</p>
                    </div>
                    <div class="flex flex-row w-full justify-between">
                        <h4>Postal Code</h4>
                        <p>{{ $order->shipments->addresses->postal_code }}</p>
                    </div>
                </div>
                {{-- note info --}}
                <div class="flex flex-col outline-2 outline-gray-300 rounded-lg p-4 gap-3">
                    <h1 class="font-semibold text-lg">Note</h1>
                    <p>{{ $order->note ?? "-" }}</p>
                </div>
            </div>
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
