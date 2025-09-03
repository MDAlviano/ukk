<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-dark-gray shadow-md flex flex-col justify-between rounded-tr-2xl rounded-br-2xl">
        <div>
            <div class="p-6 text-center">
                <a href="/" class="font-semibold text-white text-xl">Arena Sport Warehouse</a>
            </div>
            <hr class="w-5/6 mx-auto text-white">
            <nav class="flex flex-col p-4 space-y-2">
                <a href="/products" class="px-4 py-2 rounded-md font-semibold hover:bg-vibrant-orange transition duration-200 text-white">Orders</a>
                <a href="/register" class="px-4 py-2 rounded-md font-semibold hover:bg-vibrant-orange transition duration-200 text-white">Inventory</a>
                <a href="/" class="px-4 py-2 rounded-md font-semibold hover:bg-vibrant-orange transition duration-200 text-white">Report</a>
            </nav>
        </div>
        <div class="p-4 mb-10">
            <a href="{{ route('login') }}" class="px-4 py-2 text-vibrant-orange font-semibold hover:text-white transition duration-200">Log Out</a>
        </div>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-10">
        @yield('content')
    </main>

</body>
</html>