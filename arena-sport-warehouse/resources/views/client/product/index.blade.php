<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Our Products | Arena Sport Warehouse</title>
</head>
<body>
{{-- navbar --}}
<nav class="w-full flex flex-col">
    <div class="w-full flex flex-row justify-between opacity-70 px-20 py-6">
        <a href="{{ route('home') }}" class="hover:underline">Home</a>
        <a href="{{ route('categories') }}" class="hover:underline">Categories</a>
        <a href="{{ route('products') }}" class="hover:underline">Products</a>
    </div>
    <div class="px-20 py-6 outline-1 outline-gray-300 flex flex-row justify-between items-center">
        <a href="{{ route('home') }}" class="-ml-8 mr-4">
            <img src="{{ asset('/assets/ic_logo.svg') }}" alt="logo" class="w-44">
        </a>
        <div class="flex flex-row w-full gap-4 px-3 py-2 rounded-lg outline-1 outline-dark-gray">
            <img src="{{ asset('/assets/Search.svg') }}" alt="search" class="opacity-70 w-5">
            <input type="text" id="search" placeholder="Search produk..." class="focus:outline-0 w-full">
        </div>
        <div class="flex flex-row gap-5 w-fit h-fit pl-8">
            <a href="{{ route('profile.cart') }}">
                <img src="{{ asset('/assets/shopping-cart.svg') }}" alt="shopping cart" class="w-10">
                <p class="text-sm p-1 rounded-full bg-vibrant-orange text-white">{{  }}</p>
            </a>
            <a href="{{ route('profile') }}">
                <img src="{{ asset('/assets/account_circle.svg') }}" alt="profile" class="w-10">
            </a>
        </div>
    </div>
</nav>

{{-- main --}}
<main class="py-10 px-16 flex flex-col gap-16">
    {{-- filter & sort --}}
    <form method="GET" action="{{ route('products') }}" class="flex flex-row w-full justify-between">
        @csrf
        <div class="flex flex-col gap-2">
            <h1 class="font-medium text-dark-gray">Filter:</h1>
            <div class="flex flex-row gap-4">

                {{-- Filter Kategori --}}
                <select name="category" onchange="this.form.submit()" class="px-4 py-2 rounded-md border border-gray-300 text-dark-gray">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                {{-- Filter Harga --}}
                <select name="price" onchange="this.form.submit()" class="px-4 py-2 rounded-md border border-gray-300 text-dark-gray">
                    <option value="">Semua Harga</option>
                    <option value="0-100000" {{ request('price') == '0-100000' ? 'selected' : '' }}>Rp 0 - Rp 100.000
                    </option>
                    <option value="100001-500000" {{ request('price') == '100001-500000' ? 'selected' : '' }}>Rp 100.001
                        - Rp 500.000
                    </option>
                    <option value="500001-1000000" {{ request('price') == '500001-1000000' ? 'selected' : '' }}>Rp
                        500.001 - Rp 1.000.000
                    </option>
                    <option value="1000001" {{ request('price') == '1000001' ? 'selected' : '' }}>Di atas Rp 1.000.000
                    </option>
                </select>
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <h1 class="font-medium text-dark-gray">Urutkan:</h1>
            <select name="sort" class="px-4 py-2 rounded-md border border-gray-300 text-dark-gray"
                    onchange="this.form.submit()">
                <option value="">Paling Sesuai</option>
                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nama A → Z</option>
                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nama Z → A</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga Terendah</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga Tertinggi
                </option>
                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
            </select>
        </div>
    </form>

    {{-- products --}}
    <div id="products-container">
        @include('client.product.partials.product-grid')
    </div>
</main>

{{-- footer --}}
@include('partial.footer')

<script>
    const searchInput = document.getElementById('search');
    const productsContainer = document.getElementById('products-container');
    let debounceTimer;

    function performSearch() {
        const query = searchInput.value.trim();
        const url = new URL(window.location);

        if (query) {
            url.searchParams.set('search', query);
        } else {
            url.searchParams.delete('search');
        }

        // Biar filter & sort tetap stay
        fetch(url.toString(), {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.text())
            .then(html => {
                productsContainer.innerHTML = html;
            })
            .catch(err => console.error(err));
    }

    searchInput.addEventListener('input', function() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(performSearch, 400); // debounce 400ms
    });

    // Kalau user tekan Enter (opsional)
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            clearTimeout(debounceTimer);
            performSearch();
        }
    });
</script>
</body>
</html>
