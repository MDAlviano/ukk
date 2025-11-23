@extends('admin.app')

@section('content')
    <header class="px-8 py-5 bg-white drop-shadow-lg drop-shadow-[#00000028]">
        <h1 class="font-semibold text-2xl">Products</h1>
    </header>

    <div class="m-10 flex flex-col gap-8">
        {{-- filter --}}
        <div class="w-full flex flex-row justify-between">
            <div class="flex flex-col gap-1">
                <h1 class="text-lg font-semibold">Filter:</h1>
                <div class="flex flex-row gap-4">
                    {{-- Search --}}
                    <div class="flex flex-row gap-4 px-3 py-2 rounded-md outline-1">
                        <input type="text" id="search-input" placeholder="Search..."
                               class="focus:outline-0">
                        <img src="{{ asset('/assets/Search.svg') }}" alt="">
                    </div>

                    {{-- Kategori --}}
                    <select id="filter-category"
                            class="flex flex-row gap-4 px-3 py-2 rounded-md outline-1 focus:outline-0">
                        <option value="all">Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>

                    {{-- Harga --}}
                    <select id="filter-price"
                            class="flex flex-row gap-4 px-3 py-2 rounded-md outline-1 focus:outline-0">
                        <option value="all">Harga</option>
                        <option value="cheap">Di bawah Rp50.000</option>
                        <option value="medium">Rp50.000 - Rp200.000</option>
                        <option value="expensive">Di atas Rp200.000</option>
                    </select>
                </div>
            </div>

            {{-- sort --}}
            <div class="flex flex-col gap-1">
                <h1 class="text-lg font-semibold">Sort:</h1>
                <select id="sort-select"
                        class="flex flex-row gap-4 px-3 py-2 rounded-md outline-1 focus:outline-0">
                    <option value="name_asc">A-Z</option>
                    <option value="name_desc">Z-A</option>
                    <option value="price_asc">Harga: Rendah → Tinggi</option>
                    <option value="price_desc">Harga: Tinggi → Rendah</option>
                    <option value="stock_asc">Stok: Rendah → Tinggi</option>
                    <option value="stock_desc">Stok: Tinggi → Rendah</option>
                </select>
            </div>
        </div>
    </div>

    <table class="w-full table-fixed border-collapse mx-10">
        <thead>
        <tr class="bg-white rounded-tr-lg rounded-tl-lg drop-shadow-sm text-[#B6B6B6]">
            <th class="py-4 px-8 text-left">Image</th>
            <th class="py-4 text-left">Name</th>
            <th class="py-4 text-left">Category</th>
            <th class="py-4 text-left">Price</th>
            <th class="py-4 text-left">Stock</th>
            <th class="py-4 text-left">Orders</th>
            <th class="py-4 px-8 text-left">Action</th>
        </tr>
        </thead>
        <tbody id="product-table-body">
        @include('admin.product.partials.table-body')
        </tbody>
    </table>

    {{-- search script --}}
    <script>
        const searchInput = document.getElementById('search-input');
        const categorySel = document.getElementById('filter-category');
        const priceSel = document.getElementById('filter-price');
        const sortSel = document.getElementById('sort-select');
        const tableBody = document.getElementById('product-table-body');

        let timer;

        function fetchProducts() {
            clearTimeout(timer);
            timer = setTimeout(() => {
                const params = new URLSearchParams({
                    q: searchInput.value.trim(),
                    category: categorySel.value,
                    price: priceSel.value,
                    sort: sortSel.value
                });

                const url = `/admin/products/search?${params.toString()}`;

                fetch(url, {
                    method: 'GET',
                    headers: {
                        'Accept': 'text/html',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.text();
                    })
                    .then(html => {
                        tableBody.innerHTML = html;
                    })
                    .catch(err => {
                        console.error(err);
                        tableBody.innerHTML = `
                    <tr>
                        <td colspan="7" class="text-center py-10 text-red-600">
                            Terjadi kesalahan saat memuat data
                        </td>
                    </tr>`;
                    });
            }, 350);
        }

        searchInput.addEventListener('input', fetchProducts);
        categorySel.addEventListener('change', fetchProducts);
        priceSel.addEventListener('change', fetchProducts);
        sortSel.addEventListener('change', fetchProducts);
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
@endsection
