@extends('client.profile.app')

@section('content')
    <div class="flex flex-col gap-10 m-10">
        {{-- top section --}}
        <div class="flex flex-col gap-5">
            <div class="flex flex-row gap-5">
                <h1 class="text-2xl font-semibold">Order Detail : {orderId}</h1>
                <h5 class="px-3 py-1 rounded-md outline-1 outline-vibrant-orange text-vibrant-orange bg-[#FFE2D7] italic">
                    {status}</h5>
            </div>
            <p class="text-lg">September 9, 2025 at 20:48 WIB</p>
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
                        <p>{fullName}</p>
                    </div>
                    <div class="flex flex-row w-full justify-between">
                        <h4>Email</h4>
                        <p>{email}</p>
                    </div>
                    <div class="flex flex-row w-full justify-between">
                        <h4>Phone</h4>
                        <p>{phone}</p>
                    </div>
                </div>
                {{-- order items --}}
                <div class="flex flex-col outline-2 outline-gray-300 rounded-lg p-4 gap-4">
                    <h1 class="font-semibold text-lg">Order Items</h1>
                    {{-- item --}}
                    <div class="flex flex-row justify-between w-full">
                        <div class="flex flex-row gap-5">
                            <img src="{{ asset('/assets/placeholder.png') }}" alt="product image" class="size-20">
                            <div class="flex flex-col gap-3">
                                <p class="opacity-70 text-dark-gray">{category}</p>
                                <p class="text-lg font-medium text-dark-gray">{productName}</p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3 items-end">
                            <p class="text-dark-gray opacity-80">{subQuantity} x {price}</p>
                            <p class="font-medium text-dark-gray">{subTotalPrice}</p>
                        </div>
                    </div>
                </div>
                {{-- order summary --}}
                <div class="flex flex-col outline-2 outline-gray-300 rounded-lg p-4 gap-4">
                    <h1 class="font-semibold text-lg">Order Summary</h1>
                    <div class="flex flex-row w-full justify-between">
                        <h5>Subtotal</h5>
                        <p>6 item</p>
                        <p>Rp1.200.000</p>
                    </div>
                    <div class="flex flex-row w-full justify-between">
                        <h5>Shipping</h5>
                        <p>Rp50.000</p>
                    </div>
                    <span class="w-full h-[1px] border-[1px] border-gray-300"></span>
                    <div class="flex flex-row w-full justify-between">
                        <h5 class="font-medium">Total</h5>
                        <p>Rp1.250.000</p>
                    </div>
                </div>
            </div>

            {{-- right section --}}
            <div class="flex flex-col gap-5 w-3/6">
                {{-- address info --}}
                <div class="flex flex-col outline-2 outline-gray-300 rounded-lg p-4 gap-3">
                    <h1 class="font-semibold text-lg">Address</h1>
                    <div class="flex flex-row w-full justify-between">
                        <h4>Address</h4>
                        <p>{address}</p>
                    </div>
                    <div class="flex flex-row w-full justify-between">
                        <h4>City</h4>
                        <p>{city}</p>
                    </div>
                    <div class="flex flex-row w-full justify-between">
                        <h4>Province</h4>
                        <p>{province}</p>
                    </div>
                    <div class="flex flex-row w-full justify-between">
                        <h4>Country</h4>
                        <p>{country}</p>
                    </div>
                    <div class="flex flex-row w-full justify-between">
                        <h4>Postal Code</h4>
                        <p>{postalCode}</p>
                    </div>
                </div>
                {{-- note info --}}
                <div class="flex flex-col outline-2 outline-gray-300 rounded-lg p-4 gap-3">
                    <h1 class="font-semibold text-lg">Note</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, id?</p>
                </div>
            </div>
        </div>
    </div>
@endsection
