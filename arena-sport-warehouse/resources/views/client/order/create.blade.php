<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Checkout Order</title>
</head>
<body>
<header class="px-8 py-5 bg-white drop-shadow-lg drop-shadow-[#00000028]">
    <a href="/" class="font-bold text-2xl text-vibrant-orange">Arena Sport Warehouse</a>
</header>

<div class="flex flex-col gap-6 m-12">
    <h1 class="font-semibold text-2xl">Checkout</h1>
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
            {{-- shipping method --}}
            <div class="flex flex-col outline-2 outline-gray-300 rounded-lg p-4 gap-3">
                <h1 class="font-semibold text-lg">Address</h1>
                <select name="" id="" class="flex flex-row gap-4 pl-3 pr-8 py-2 rounded-md outline-1">
                    <option value="">Kurir</option>
                </select>
            </div>
            {{-- address info --}}
            <div class="flex flex-col outline-2 outline-gray-300 rounded-lg p-4 gap-3">
                <div class="flex flex-row justify-between">
                    <h1 class="font-semibold text-lg">Address</h1>
                    <a href="/"><img src="{{ asset('/assets/edit.svg') }}" alt=""></a>
                </div>
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
                <textarea name="" id="" cols="30" rows="4" placeholder="Tulis Sesuatu..."
                          class="py-2 px-3 outline-1 rounded-lg"></textarea>
            </div>
            <button
                class="rounded-lg bg-vibrant-orange px-4 py-2 my-2 text-white font-semibold hover:opacity-80 transition-opacity duration-200">
                Pay Now
            </button>
        </div>
    </div>
</div>

</body>
</html>
