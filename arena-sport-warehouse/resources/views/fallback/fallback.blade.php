<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Not Found</title>
</head>
<body>
    <div class="mx-auto flex font-bold text-2xl flex-col">
        <h1>Sorry, we can't find what do you want 😔</h1>
        <a href="{{ route('app') }}" class="w-fit px-3 py-1 bg-vibrant-orange rounded-md text-white text-lg font-semibold">Back to Home</a>
    </div>
</body>
</html>