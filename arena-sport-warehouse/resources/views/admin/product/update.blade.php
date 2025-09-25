@extends('admin.app')

@section('content')
    <header class="px-8 py-5 bg-white drop-shadow-lg drop-shadow-[#00000028]">
        <h1 class="font-semibold text-2xl">Update Product</h1>
    </header>

    <form class="flex flex-row gap-12 mx-20 my-12 bg-white shadow-xl rounded-xl p-7" onsubmit="">
        <div class="w-3/5 flex flex-col gap-5">
            <h1 class="text-lg font-semibold">Add Product Form</h1>
            <div class="flex flex-row gap-5">
                <div class="flex flex-col gap-2 w-full">
                    <h4 class="font-semibold">Name</h4>
                    <input type="text" placeholder="My Product" class="outline-2 py-2 px-4 rounded-md">
                </div>
                <div class="flex flex-col gap-2 w-full">
                    <h4>Price</h4>
                    <input type="text" placeholder="200.000" class="outline-2 py-2 px-4 rounded-md">
                </div>
            </div>
            <div class="flex flex-row gap-5">
                <div class="flex flex-col gap-2 w-fit">
                    <h4>Stock</h4>
                    <input type="number" placeholder="50" class="outline-2 py-2 px-4 rounded-md w-16">
                </div>
                <div class="flex flex-col gap-2 w-full">
                    <h4>Category</h4>
                    <select name="" id="" class="outline-2 py-2 px-4 rounded-md">
                        <option value="">Category</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-col gap-2 w-full">
                <h4>Description</h4>
                <textarea name="" id="" cols="6" rows="10"
                          placeholder="This is my first product, i hope it can increase my money..."
                          class="outline-2 py-2 px-4 rounded-md"></textarea>
            </div>
            <button type="submit"
                    class="w-full bg-vibrant-orange text-white p-2 rounded-lg my-4 hover:opacity-70 transition duration-200">
                Create New Product
            </button>
        </div>
        <div class="w-2/5 h-fit outline-2 py-3 px-4 rounded-md flex flex-col gap-4">
            <h4>Image</h4>
            <input type="image" src="{{ asset('/assets/ic_baseline-plus.svg') }}" alt="Input Image Product"
                   class="outline-2 py-2 px-4 rounded-md h-24 mb-2">
        </div>
    </form>
@endsection
