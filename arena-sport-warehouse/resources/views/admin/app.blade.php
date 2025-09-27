<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Admin Panel</title>
</head>
<body class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-dark-gray shadow-md flex flex-col justify-between">
        <div>
            <div class="p-6 text-center">
                <a href="/admin" class="font-semibold text-white text-xl">Arena Sport Warehouse</a>
            </div>
            <hr class="w-5/6 mx-auto text-white">
            <nav class="flex flex-col p-4 space-y-2 text-lg">
                <a href="/admin/orders" class="px-4 py-2 rounded-md font-semibold hover:bg-vibrant-orange transition duration-200 text-white">My Orders</a>
                <div class="flex flex-col">
                    <h5 class="px-4 py-2 cursor-pointer rounded-md font-semibold hover:bg-vibrant-orange transition duration-200 text-white">My Product</h5>
                    <div class="text-white text-sm font-light flex flex-col gap-2 mt-2 ml-7">
                        <a href="/admin/products" class="hover:opacity-80">List Products</a>
                        <a href="/admin/products/create" class="hover:opacity-80">Create Product</a>
                    </div>
                </div>
                <div class="flex flex-col">
                    <h5 class="px-4 py-2 cursor-pointer rounded-md font-semibold hover:bg-vibrant-orange transition duration-200 text-white">My Category</h5>
                    <div class="text-white text-sm font-light flex flex-col gap-2 mt-2 ml-7">
                        <a href="/admin/categories" class="hover:opacity-80">List Categories</a>
                        <a href="/admin/categories/create" class="hover:opacity-80">Create Category</a>
                    </div>
                </div>
                <a href="/admin/reports" class="px-4 py-2 rounded-md font-semibold hover:bg-vibrant-orange transition duration-200 text-white">Report</a>
            </nav>
        </div>
        <div class="p-4 mb-10">
            <a href="{{ route('login') }}" class="px-4 py-2 text-vibrant-orange font-semibold hover:text-white transition duration-200">Log Out</a>
        </div>
    </aside>

    <!-- Main content -->
    <main class="flex-1">
        @yield('content')
    </main>

</body>
</html>
