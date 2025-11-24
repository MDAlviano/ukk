<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Our Categories | Arena Sport Warehouse</title>
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
            <input type="text" id="search-input" placeholder="Cari kategori..."
                   class="focus:outline-0 w-full">
        </div>
        <div class="flex flex-row gap-5 w-fit h-fit pl-8">
            <a href="{{ route('profile.cart') }}">
                <img src="{{ asset('/assets/shopping-cart.svg') }}" alt="shopping cart" class="w-10">
            </a>
            <a href="{{ route('profile') }}">
                <img src="{{ asset('/assets/account_circle.svg') }}" alt="profile" class="w-10">
            </a>
        </div>
    </div>
</nav>

{{-- categories --}}
<main id="categories-container" class="px-20 py-16 flex flex-col">
    @include('client.category.partials.category-grid')
</main>

@include('partial.footer')

<script>
    const searchInput = document.getElementById('search-input');
    const container = document.getElementById('categories-container');
    let debounceTimer;

    function performSearch() {
        const query = searchInput.value.trim();
        const url = new URL(window.location.href);

        if (query) {
            url.searchParams.set('search', query);
        } else {
            url.searchParams.delete('search');
        }

        fetch(url.toString(), {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.text())
            .then(html => {
                container.innerHTML = html;
            })
            .catch(err => console.error('Error:', err));
    }

    searchInput.addEventListener('input', function () {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(performSearch, 400); // 400ms debounce
    });

    // Optional: langsung cari saat tekan Enter
    searchInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            clearTimeout(debounceTimer);
            performSearch();
        }
    });
</script>
</body>
</html>
