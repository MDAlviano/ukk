@extends('admin.app')

@section('content')
    <header class="px-8 py-5 bg-white drop-shadow-lg drop-shadow-[#00000028]">
        <h1 class="font-semibold text-2xl">Categories</h1>
    </header>

    <main class="m-10 flex flex-col gap-8">
        {{--  filter  --}}
        <div class="flex flex-row gap-6">
            <div class="flex flex-row gap-4 px-3 py-2 rounded-md outline-1">
                <input type="text" placeholder="Search..." class="text-[#B6B6B6] focus:outline-0">
                <img src="{{ asset('/assets/Search.svg') }}" alt="">
            </div>
        </div>

        <div class="flex flex-col gap-2">
            {{-- title --}}
            <div class="w-full h-fit flex flex-row bg-white rounded-tr-lg rounded-tl-lg drop-shadow-sm py-4 px-8 gap-3 text-[#B6B6B6]">
                <h5>Image</h5>
                <h5 class="ml-16">Name</h5>
                <h5 class="ml-80">Total Products</h5>
                <h5 class="ml-72">Action</h5>
            </div>
            {{-- item --}}
            <x-admin-category-card
                imageUrl="/assets/placeholder.png"
                title="Badminton"
                products=10
            />
            <x-admin-category-card
                imageUrl="/assets/placeholder.png"
                title="Badminton"
                products=10
            />
        </div>
    </main>

@endsection
