<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Register | Arena Sport Warehouse</title>
</head>
<body>
    <div class="flex flex-row justify-between m-12 gap-10">
        <div class="w-full">
            <a href="{{ route('landing') }}" class="font-bold text-vibrant-orange mt-5"><img src="{{ asset('/assets/ic_logo.svg') }}" alt="icon" class="w-44 -ml-4"></a>
            <h1 class="text-4xl font-bold text-dark-gray mt-16">Selamat Datang!</h1>
            <p class="text-gray-400 w-2/3 mt-3">Arena sport warehouse akan menjadi tempat favorit kamu untuk belanja alat-alat olahraga</p>

            <form action="{{ route('user.register') }}" method="POST" class="flex flex-col gap-4 mt-8">
                @csrf
                <div class="flex flex-col text-dark-gray gap-1">
                    <label for="email" class="font-medium">Email</label>
                    <input type="email" name="email" id="" required placeholder="..." class="py-2 px-4 border-[2px] border-light-gray focus:outline-0 rounded-md">
                </div>
                <div class="flex flex-col text-dark-gray gap-1">
                    <label for="phone" class="font-medium">Phone</label>
                    <input type="text" name="phone" id="" required placeholder="..." class="py-2 px-4 border-[2px] border-light-gray focus:outline-0 rounded-md">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="full_name" class="font-medium">Full Name</label>
                    <input type="text" name="full_name" required placeholder="..." class="py-2 px-4 border-[2px] border-light-gray focus:outline-0 rounded-md">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="password" class="font-medium">Password</label>
                    <input type="password" name="password" required placeholder="..." class="py-2 px-4 border-[2px] border-light-gray focus:outline-0 rounded-md">
                </div>
                <button type="submit" class="bg-vibrant-orange hover:opacity-85 transition duration-200 text-white w-fit px-4 py-2 rounded-md text-sm font-semibold">Sign Up</button>
            </form>

            <p class="mt-14 text-sm text-dark-gray">Sudah memiliki akun? <a href="{{ route('login') }}" class="text-vibrant-orange hover:opacity-85 transition duration-200 font-bold">Login</a></p>
        </div>
        <img src="{{ asset('/assets/ig_register.png') }}" alt="register image" class="h-[90vh] rounded-xl">
    </div>

    @if(session('success'))
        <script>
            alert(' {{ session('success') }}');
        </script>
    @else
        <script>
            alert(' {{ session('error') }}');
        </script>
    @endif
</body>
</html>
