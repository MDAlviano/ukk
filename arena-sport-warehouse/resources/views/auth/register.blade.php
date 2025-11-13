<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Register</title>
</head>
<body>
    <div class="flex flex-row justify-between m-12 gap-14">
        <div class="w-full">
            <a href="/" class="font-bold text-vibrant-orange mt-5">Arena Sport Warehouse</a>
            <h1 class="text-4xl font-bold text-dark-gray mt-16">Selamat Datang!</h1>
            <p class="text-gray-400 text-sm w-2/3 mt-3">Arena sport warehouse akan menjadi tempat favorit kamu untuk belanja alat-alat olahraga</p>
            <form action="" class="flex flex-col gap-4 mt-8">
                <div class="flex flex-col text-dark-gray">
                    <label for="">Email</label>
                    <input type="email" name="" id="" required placeholder="johndoe@gmail.com" class="p-2 border-[2px] border-light-gray focus:outline-0 rounded-md font-medium">
                </div>
                <div class="flex flex-col">
                    <label for="">Full Name</label>
                    <input type="text" required placeholder="John Doe" class="p-2 border-[2px] border-light-gray focus:outline-0 rounded-md font-medium">
                </div>
                <div class="flex flex-col">
                    <label for="">Password</label>
                    <input type="password" required placeholder="j0hnd03#!" class="p-2 border-[2px] border-light-gray focus:outline-0 rounded-md font-medium">
                </div>
                <button class="bg-vibrant-orange hover:opacity-85 transition duration-200 text-white w-fit px-4 py-2 rounded-md text-sm font-semibold">Sign Up</button>
            </form>
            <p class="mt-14 text-sm text-dark-gray">Sudah memiliki akun? <a href="{{ route('login') }}" class="text-vibrant-orange hover:opacity-85 transition duration-200 font-bold">Login</a></p>
        </div>
        <img src="{{ asset('/assets/ig_register.png') }}" alt="register image" class="h-[90vh] rounded-xl">
    </div>
</body>
</html>
