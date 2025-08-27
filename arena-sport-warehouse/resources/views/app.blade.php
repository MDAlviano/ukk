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
    <aside class="w-64 bg-white shadow-md flex flex-col justify-between">
        <div>
            <div class="p-6 text-center border-b">
                <a href="/">
                    <img src="{{ asset('assets/logo.png') }}" alt="">
                </a>
            </div>
            <nav class="flex flex-col p-4 space-y-2">
                <a href="/products" class="px-4 py-2 rounded hover:bg-blue-100 text-gray-700">Products</a>
                <a href="/register" class="px-4 py-2 rounded hover:bg-blue-100 text-gray-700">Collections</a>
                <a href="/" class="px-4 py-2 rounded hover:bg-blue-100 text-gray-700">Orders</a>
            </nav>
        </div>
        <div class="p-4 border-t">
            <form action="{{ redirect('/login') }}">
                <button type="submit" class="w-full px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Logout</button>
            </form>
        </div>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-10">
        @yield('content')
    </main>

</body>
</html>