<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>My Profile</title>
</head>
<body class="flex min-h-screen">
<!-- Sidebar -->
<aside class="w-64 shadow-lg flex flex-col justify-between">
    <div>
        <a href="/" class="flex flex-row gap-2 px-6 pt-6 hover:opacity-80 transition duration-200">
            <img src="{{ asset('assets/arrow_back.svg') }}" alt="back">
            <h5 class="text-lg font-medium">Back</h5>
        </a>
        <div class="p-6 flex flex-row items-center gap-3">
            <img src="{{ asset('assets/placeholder.png') }}" alt="plachholder" class="rounded-full size-16">
            <div class="flex flex-col">
                <h2 class="font-semibold text-xl">Alviano</h2>
                <h3 class="font-semibold">alvin@gmail.com</h3>
            </div>
        </div>
        <hr class="w-5/6 mx-auto">
        <nav class="flex flex-col p-4 space-y-2 text-lg">
            <div class="flex flex-row items-center gap-3 hover:shadow-lg transition duration-200 text-white cursor-pointer rounded-lg px-3 py-3 align-middle">
                <img src="{{ asset('/assets/user.svg') }}" alt="cart icon" class="size-6">
                <a href="/profile" class="font-semibold text-black">My Profile</a>
            </div>
            <div class="flex flex-row items-center gap-3 hover:shadow-lg transition duration-200 text-white cursor-pointer rounded-lg px-3 py-3 align-middle">
                <img src="{{ asset('/assets/shopping-cart.svg') }}" alt="cart icon" class="size-6">
                <a href="/profile/orders" class="font-semibold text-black">My Orders</a>
            </div>
        </nav>
    </div>
    <div class="p-4 mb-10 flex flex-row px-4 py-2 text-red-500 hover:text-red-400 gap-2 hover:cursor-pointer transition duration-200">
        <img src="{{ asset('/assets/log-out.svg') }}" alt="logout icon" class="size-6">
        <a href="/" class="font-semibold">Log Out</a>
    </div>
</aside>

<!-- Main content -->
<main class="flex-1">
    @yield('content')
</main>

</body>
</html>
