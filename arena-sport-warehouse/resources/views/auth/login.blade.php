<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title></title>
</head>
<body>
    <div class="flex flex-row justify-between m-12 gap-14">
        <div class="w-full">
            <a href="/" class="font-bold text-vibrant-orange mt-5">Arena Sport Warehouse</a>
            <h1 class="text-4xl font-bold text-dark-gray mt-16">Halo!</h1>
            <h1 class="text-4xl font-bold text-dark-gray mt-2">Selamat Datang Kembali!</h1>
            <p class="text-gray-400 text-sm w-2/3 mt-3">Hey, selamat datang kembali di tempat belanja favorit mu</p>
            <form action="" class="flex flex-col gap-4 mt-8">
                <div class="flex flex-col text-dark-gray">
                    <label for="">Email</label>
                    <input type="email" name="" id="" required placeholder="johndoe@gmail.com" class="p-2 border-[2px] border-light-gray focus:outline-0 rounded-md font-medium">
                </div>
                <div class="flex flex-col">
                    <label for="">Password</label>
                    <input type="password" required placeholder="j0hnd03#!" class="p-2 border-[2px] border-light-gray focus:outline-0 rounded-md font-medium">
                </div>
                <a href="" class="underline font-semibold text-sm text-dark-gray hover:opacity-85 transition duration-200 self-end">Lupa Password?</a>
                <button class="bg-vibrant-orange hover:opacity-85 transition duration-200 text-white w-fit px-4 py-2 rounded-md text-sm font-semibold">Sign In</button>
            </form>
            <p class="mt-14 text-sm text-dark-gray">Belum memiliki akun? <a href="{{ route('register') }}" class="text-vibrant-orange hover:opacity-85 transition duration-200 font-bold">Daftar Sekarang</a></p>
        </div>
        <img src="{{ asset('/assets/ig_login.png') }}" alt="login image" class="h-[90vh] rounded-xl">
    </div>
</body>
</html>
