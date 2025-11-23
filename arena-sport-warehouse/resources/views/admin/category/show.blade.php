@extends('admin.app')

@section('content')
    <header class="px-8 py-5 bg-white drop-shadow-lg drop-shadow-[#00000028]">
        <h1 class="font-semibold text-2xl">Products of {{ $category->name }} Collection</h1>
    </header>

    <div class="m-10 flex flex-col gap-8">
        <table class="w-full table-fixed border-collapse">
            <thead>
            <tr class="bg-white rounded-tr-lg rounded-tl-lg drop-shadow-sm text-[#B6B6B6]">
                <th class="py-4 px-8 text-left">Image</th>
                <th class="py-4 text-left">Name</th>
                <th class="py-4 text-left">Price</th>
                <th class="py-4 text-left">Stock</th>
                <th class="py-4 text-left">Orders</th>
                <th class="py-4 px-8 text-left">Action</th>
            </tr>
            </thead>
            <tbody id="product-table-body">
            @include('admin.category.partials.table-body-products')
            </tbody>
        </table>
    </div>

    <script>
        const searchInput   = document.getElementById('search-input');
        const priceSel      = document.getElementById('filter-price');
        const sortSel       = document.getElementById('sort-select');
        const tableBody     = document.getElementById('product-table-body');

        let timer;

        function fetchProducts() {
            clearTimeout(timer);
            timer = setTimeout(() => {
                const params = new URLSearchParams({
                    q        : searchInput.value.trim(),
                    price    : priceSel.value,
                    sort     : sortSel.value
                });

                const url = `/admin/categories/{{ $category->slug }}/products/search?${params.toString()}`;

                fetch(url, {
                    method: 'GET',
                    headers: {
                        'Accept'       : 'text/html',
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
