<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Arena Sport Warehouse | Admin Panel</title>
</head>
<body class="flex min-h-screen">
{{-- sidebar --}}
<aside class="w-64 bg-dark-gray shadow-md flex flex-col justify-between">
    <div>
        <div class="p-6 text-center">
            <a href="/admin" class="-ml-8 w-32">
                <img src="{{ '/assets/ic_logo.svg' }}" alt="logo">
            </a>
        </div>
        <hr class="w-5/6 mx-auto text-white">
        <nav class="flex flex-col p-4 space-y-2 text-lg">
            <div
                class="flex flex-row gap-2 hover:bg-vibrant-orange transition duration-200 text-white cursor-pointer rounded-md px-2 py-2 align-middle">
                <img src="{{ asset('/assets/shopping-cart-white.svg') }}" alt="cart icon" class="size-6">
                <a href="{{ route('admin.orders') }}" class="font-semibold">My Orders</a>
            </div>
            <div class="flex flex-col">
                <div
                    class="flex flex-row gap-2 hover:bg-vibrant-orange transition duration-200 text-white cursor-pointer rounded-md px-2 py-2 align-middle">
                    <img src="{{ asset('/assets/box.svg') }}" alt="cart icon" class="size-6">
                    <h5 class="font-semibold">My Product</h5>
                </div>
                <div class="text-white text-sm font-light flex flex-col gap-2 mt-2 ml-10">
                    <a href="{{ route('admin.products') }}" class="hover:opacity-80">List Products</a>
                    <a href="/admin/products/create" class="hover:opacity-80">Create Product</a>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="flex flex-row gap-2 hover:bg-vibrant-orange transition duration-200 text-white cursor-pointer rounded-md px-2 py-2 align-middle">
                    <img src="{{ asset('/assets/box.svg') }}" alt="box icon" class="size-6">
                    <h5 class="font-semibold">My Category</h5>
                </div>
                <div class="text-white text-sm font-light flex flex-col gap-2 mt-2 ml-10">
                    <a href="{{ route('admin.categories') }}" class="hover:opacity-80">List Categories</a>
                    <a href="/admin/categories/create" class="hover:opacity-80">Create Category</a>
                </div>
            </div>
            <div class="flex flex-row gap-2 hover:bg-vibrant-orange transition duration-200 text-white cursor-pointer rounded-md px-2 py-2 align-middle">
                <img src="{{ asset('/assets/book.svg') }}" alt="box icon" class="size-6">
                <a href="/admin/reports" class="font-semibold">Report</a>
            </div>
        </nav>
    </div>
    <div class="p-4 mb-10 flex flex-row px-4 py-2 text-vibrant-orange gap-2 hover:cursor-pointer">
        <img src="{{ asset('/assets/log-out.svg') }}" alt="logout icon" class="size-6">
        <a href="{{ route('user.logout') }}" class="font-semibold">Log Out</a>
    </div>
</aside>

{{-- main content --}}
<main class="flex-1">
    @yield('content')
</main>

</body>
</html>
