<div class="w-full h-fit flex flex-row justify-between bg-white rounded-lg drop-shadow-lg py-4 px-8 gap-3">
    <img src="{{ asset($imageUrl) }}" alt="product image" class="w-20 rounded-md object-cover">
    <div class="w-fit h-fit flex flex-col gap-1 my-auto">
        <h1 class="font-semibold">{{ $uniqueId }}</h1>
        <h1 class="font-semibold hover:underline"><a href="/admin/products/slug">{{ $title }}</a></h1>
        <h5 class="text-sm text-[#B6B6B6] font-normal truncate max-w-64">{{ $description }}</h5>
    </div>
    <h5 class="h-fit text-white font-medium bg-vibrant-orange px-3 py-2 text-sm rounded-md my-auto">{{ $category }}</h5>
    <h5 class="my-auto">Rp {{ number_format($price) }}</h5>
    <h5 class="my-auto">{{ number_format($quantity) }}</h5>
    <h5 class="my-auto">{{ $orders }}</h5>
    <div class="flex flex-row w-fit h-fit gap-3 my-auto">
        <a href="/admin/products/update"
           class="bg-[#E6E6E6] px-3 py-1 rounded-lg hover:bg-gray-300 transition duration-200">Edit</a>
        <a href="" class="bg-[#E6E6E6] px-3 py-1 rounded-lg hover:bg-gray-300 transition duration-200">Delete</a>
    </div>
</div>
