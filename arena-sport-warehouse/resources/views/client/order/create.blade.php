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
    <a href="{{ route('home') }}">
        <img src="{{ asset('/assets/ic_logo.svg') }}" alt="logo" class="w-44 ml-4">
    </a>
</header>

<div class="flex flex-col gap-6 m-12">
    <h1 class="font-semibold text-2xl">Checkout</h1>
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <div class="flex flex-row gap-5">
            <!-- Left Section -->
            <div class="flex flex-col gap-5 w-full">
                <!-- Customer Info -->
                <div class="flex flex-col outline-2 outline-gray-300 rounded-lg p-4 gap-3">
                    <h1 class="font-semibold text-lg">Customer</h1>
                    <div class="flex flex-row w-full justify-between">
                        <h4>Full Name</h4>
                        <p>{{ Auth::user()->full_name }}</p>
                    </div>
                    <div class="flex flex-row w-full justify-between">
                        <h4>Email</h4>
                        <p>{{ Auth::user()->email }}</p>
                    </div>
                    <div class="flex flex-row w-full justify-between">
                        <h4>Phone</h4>
                        <p>{{ Auth::user()->phone }}</p>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="flex flex-col outline-2 outline-gray-300 rounded-lg p-4 gap-4">
                    <h1 class="font-semibold text-lg">Order Items</h1>
                    @foreach($carts as $cart)
                        <div class="flex flex-row justify-between w-full">
                            <div class="flex flex-row gap-5">
                                <img src="{{ asset('/storage/' . $cart->products->image_url) }}" alt="product image"
                                     class="size-20 rounded-md object-cover">
                                <div class="flex flex-col gap-3">
                                    <p class="opacity-70 text-dark-gray">{{ $cart->products->categories->name }}</p>
                                    <p class="text-lg font-medium text-dark-gray">{{ $cart->products->name }}</p>
                                </div>
                            </div>
                            <div class="flex flex-col gap-3 items-end">
                                <p class="text-dark-gray opacity-80">{{ $cart->quantity }}
                                    x {{ number_format($cart->products->price, 0, ',', '.') }}</p>
                                <p class="font-medium text-dark-gray">
                                    Rp {{ number_format($cart->quantity * $cart->products->price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Order Summary -->
                <div class="flex flex-col outline-2 outline-gray-300 rounded-lg p-4 gap-4">
                    <h1 class="font-semibold text-lg">Order Summary</h1>
                    <div class="flex flex-row w-full justify-between">
                        <h5>Subtotal</h5>
                        <p>{{ $carts->sum('quantity') }} item</p>
                        <p>Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
                    </div>
                    <div class="flex flex-row w-full justify-between">
                        <h5>Shipping</h5>
                        <p>Rp {{ number_format($shippingPrice, 0, ',', '.') }}</p>
                    </div>
                    <span class="w-full h-[1px] border-[1px] border-gray-300"></span>
                    <div class="flex flex-row w-full justify-between">
                        <h5 class="font-medium">Total</h5>
                        <p class="text-xl font-bold">Rp {{ number_format($finalPrice, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Right Section -->
            <div class="flex flex-col gap-5 w-3/6">
                <div class="flex flex-col outline-2 outline-gray-300 rounded-lg p-4 gap-3">
                    <h1 class="font-semibold text-lg">Shipping Method</h1>
                    <select name="shipping_method" id="shipping-method" required
                            class="w-full pl-3 pr-8 py-2 rounded-md outline-1 outline-gray-300">
                        <option value="delivery">Antar ke Alamat (Rp25.000)</option>
                        <option value="pickup">Ambil di Toko (Gratis)</option>
                    </select>
                </div>
                <!-- Address Selection -->
                <div class="flex flex-col outline-2 outline-gray-300 rounded-lg p-4 gap-3">
                    <h1 class="font-semibold text-lg">Pilih Alamat</h1>
                    <select name="address_id" id="address-select" required
                            class="w-full pl-3 pr-8 py-2 rounded-md outline-1 outline-gray-300">
                        <option value="">-- Pilih Alamat --</option>
                        @foreach($addresses as $addr)
                            <option value="{{ $addr->id }}">
                                {{ $addr->address }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Selected Address Detail (Preview) -->
                <div class="flex flex-col outline-2 outline-gray-300 rounded-lg p-4 gap-3">
                    <h1 class="font-semibold text-lg">Detail Alamat</h1>
                    <div id="address-preview" class="text-sm text-gray-600">
                        <p>Silakan pilih alamat terlebih dahulu</p>
                    </div>
                </div>

                <!-- Note -->
                <div class="flex flex-col outline-2 outline-gray-300 rounded-lg p-4 gap-3">
                    <h1 class="font-semibold text-lg">Catatan (Opsional)</h1>
                    <textarea name="notes" cols="30" rows="4" placeholder="Tulis sesuatu..."
                              class="py-2 px-3 outline-1 rounded-lg"></textarea>
                </div>

                <button type="submit"
                        class="rounded-lg bg-vibrant-orange px-4 py-3 my-2 text-white font-semibold hover:opacity-80 transition-opacity duration-200 text-lg">
                    Buat Pesanan & Lanjut ke Pembayaran
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const shippingMethod = document.getElementById('shipping-method');
        const addressSection = document.getElementById('address-section');
        const addressSelect = document.getElementById('address-select');
        const addressPreview = document.getElementById('address-preview');

        // Data alamat dari server
        const addresses = @json($addresses);
        const subtotal = {{ $subtotal }};

        // Element yang akan diupdate (ongkir & total)
        const shippingPriceEl = document.querySelector('.flex.flex-row.w-full.justify-between:nth-child(2) p:last-child');
        const totalPriceEl = document.querySelector('h5.font-medium ~ p.text-xl');

        // Fungsi untuk update ongkir dan total
        function updatePricing() {
            const method = shippingMethod.value;
            const shippingPrice = method === 'pickup' ? 0 : 25000;
            const finalPrice = subtotal + shippingPrice;

            // Update teks ongkir
            if (shippingPriceEl) {
                shippingPriceEl.textContent = 'Rp ' + shippingPrice.toLocaleString('id-ID');
            }

            // Update teks total
            if (totalPriceEl) {
                totalPriceEl.textContent = 'Rp ' + finalPrice.toLocaleString('id-ID');
            }
        }

        // Fungsi untuk update tampilan alamat
        function updateAddressPreview() {
            const selectedId = addressSelect.value;
            const selected = addresses.find(addr => addr.id == selectedId);

            if (selected) {
                addressPreview.innerHTML = `
                <div class="flex flex-col gap-2">
                    <div class="flex flex-row w-full justify-between">
                        <h4>Recipient Name</h4>
                        <p>${selected.recipient_name}</p>
                    </div>
                    <div class="flex flex-row w-full justify-between">
                        <h4>Address</h4>
                        <p>${selected.address}${selected.additional_info ? ', ' + selected.additional_info : ''}</p>
                    </div>
                    <div class="flex flex-row w-full justify-between">
                        <h4>City</h4>
                        <p>${selected.city}</p>
                    </div>
                    <div class="flex flex-row w-full justify-between">
                        <h4>Postal Code</h4>
                        <p>${selected.postal_code}</p>
                    </div>
                </div>
            `;
            } else {
                addressPreview.innerHTML = '<p>Silakan pilih alamat terlebih dahulu</p>';
            }
        }

        // Event listener untuk shipping method
        shippingMethod.addEventListener('change', function() {
            const method = this.value;

            // Show/hide address section
            if (method === 'pickup') {
                addressSection.style.display = 'none';
                addressSelect.removeAttribute('required');
                addressSelect.value = ''; // reset selection
                addressPreview.innerHTML = '<p><em>Metode Ambil di Toko - Alamat tidak diperlukan</em></p>';
            } else {
                addressSection.style.display = 'block';
                addressSelect.setAttribute('required', 'required');
                updateAddressPreview(); // refresh preview
            }

            updatePricing(); // update ongkir & total
        });

        // Event listener untuk address selection (script lama yang diperbaiki)
        addressSelect.addEventListener('change', updateAddressPreview);

        // Jalankan sekali saat halaman load
        updatePricing();
        if (shippingMethod.value === 'pickup') {
            addressSection.style.display = 'none';
            addressSelect.removeAttribute('required');
        }
    });
</script>

@if(session('success'))
    <script>
        alert(' {{ session('success') }}');
    </script>
@else
    <script>
        alert(' {{ session('error') }}');
    </script>
@endif
</body>
</html>
