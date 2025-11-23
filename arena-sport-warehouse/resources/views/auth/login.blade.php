<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Login | Arena Sport Warehouse</title>
</head>
<body>
    <div class="flex flex-row justify-between m-12 gap-14">
        <div class="w-full">
            <a href="/" class="font-bold text-vibrant-orange mt-5"><img src="{{ asset('/assets/ic_logo.svg') }}" alt="icon" class="w-40 -ml-3"></a>
            <h1 class="text-4xl font-bold text-dark-gray mt-16">Halo!</h1>
            <h1 class="text-4xl font-bold text-dark-gray mt-2">Selamat Datang Kembali!</h1>
            <p class="text-gray-400 w-2/3 mt-3">Hey, selamat datang kembali di tempat belanja favorit mu</p>

            <form action="{{ route('user.login') }}" method="POST" class="flex flex-col gap-4 mt-8">
                @csrf
                <div class="flex flex-col text-dark-gray gap-1">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="" required placeholder="johndoe@gmail.com" class="py-2 px-4 border-[2px] border-light-gray focus:outline-0 rounded-md">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="password">Password</label>
                    <input type="password" name="password" required placeholder="..." class="py-2 px-4 border-[2px] border-light-gray focus:outline-0 rounded-md">
                </div>
                <button type="submit" class="bg-vibrant-orange hover:opacity-85 transition duration-200 text-white w-fit px-4 py-2 rounded-md text-sm font-semibold">Sign In</button>
            </form>

            <p class="mt-14 text-sm text-dark-gray">Belum memiliki akun? <a href="{{ route('register') }}" class="text-vibrant-orange hover:opacity-85 transition duration-200 font-bold">Daftar Sekarang</a></p>
        </div>
        <img src="{{ asset('/assets/ig_login.png') }}" alt="login image" class="h-[90vh] rounded-xl">
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
