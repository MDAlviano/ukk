@extends('admin.app')

@section('content')
    <header class="px-8 py-5 bg-white drop-shadow-lg drop-shadow-[#00000028]">
        <h1 class="font-semibold text-2xl">Categories</h1>
    </header>

    <main class="m-10 flex flex-col gap-8">
        {{--  filter  --}}
        <div class="flex flex-row gap-6">
            <div class="flex flex-row gap-4 px-3 py-2 rounded-md outline-1">
                <input type="text" id="search-input" placeholder="Search..." class="focus:outline-0">
                <img src="{{ asset('/assets/Search.svg') }}" alt="">
            </div>
        </div>

        <table class="table-fixed border-collapse">
            <thead>
            <tr class="bg-white rounded-tr-lg rounded-tl-lg drop-shadow-sm text-[#B6B6B6]">
                <th class="py-4 px-8 text-left">Image</th>
                <th class="py-4 text-left">Name</th>
                <th class="py-4 text-left">Total Products</th>
                <th class="py-4 px-8 text-left">Action</th>
            </tr>
            </thead>
            <tbody id="category-table-body">
            @include('admin.category.partials.table-body')
            </tbody>
        </table>
    </main>

    <script>
        const searchInput = document.getElementById('search-input');
        const tableBody = document.getElementById('category-table-body');

        let timer;

        function fetchCategories() {
            clearTimeout(timer);
            timer = setTimeout(() => {
                const params = new URLSearchParams({
                    q: searchInput.value.trim(),
                });

                const url = `/admin/categories/search?${params.toString()}`;

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

        searchInput.addEventListener('input', fetchCategories);
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
