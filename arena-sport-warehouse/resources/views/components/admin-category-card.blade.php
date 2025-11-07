<div class="w-full h-fit flex flex-row justify-between bg-white rounded-lg drop-shadow-lg py-4 px-8 gap-3">
    <div class="flex flex-row gap-6">
        <img src="{{ asset($imageUrl) }}" alt="category image" class="size-24 rounded-md object-cover">
        <h5 class="font-semibold my-auto hover:underline"><a href="/admin/categories/slug">{{ $title }}</a></h5>
    </div>
    <h5 class="font-semibold my-auto">{{ $products }} Products</h5>
    <div class="flex flex-row w-fit h-fit gap-3 my-auto">
        <a href="/admin/categories/update"
           class="bg-[#E6E6E6] px-3 py-1 rounded-lg hover:bg-gray-300 transition duration-200">Edit</a>
        <a href="" class="bg-[#E6E6E6] px-3 py-1 rounded-lg hover:bg-gray-300 transition duration-200">Delete</a>
    </div>
</div>
