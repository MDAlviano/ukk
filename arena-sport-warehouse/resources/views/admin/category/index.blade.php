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

        <table class="w-full table-fixed border-collapse">
            <thead>
            <tr class="bg-white rounded-tr-lg rounded-tl-lg drop-shadow-sm text-[#B6B6B6]">
                <th class="py-4 px-8 text-left">Image</th>
                <th class="py-4 px-8 text-left">Name</th>
                <th class="py-4 px-8 text-left">Total Products</th>
                <th class="py-4 px-8 text-left">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr class="bg-white rounded-lg drop-shadow-lg">
                    <td class="py-4 px-8 align-middle">
                        <div class="flex items-center gap-6">
                            <img src="{{ asset($category->image_url) }}" alt="{{ $category->name }}"
                                 class="size-24 rounded-md object-cover">
                            <h5 class="font-semibold hover:underline"><a
                                    href="{{ route('admin.category.show', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                            </h5>
                        </div>
                    </td>
                    <td class="py-4 px-8 align-middle font-semibold">{{ $category->products->count() }} Products</td>
                    <td class="py-4 px-8 align-middle">
                        <div class="flex gap-3">
                            <a href="{{ route('admin.category.edit', ['slug' => $category->slug]) }}"
                               class="bg-[#E6E6E6] px-3 py-1 rounded-lg hover:bg-gray-300 transition duration-200">Edit</a>
                            <a href="{{ route('admin.category.delete', ['id' => $category->id]) }}"
                               class="bg-[#E6E6E6] px-3 py-1 rounded-lg hover:bg-gray-300 transition duration-200">Delete</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </main>

    @if(session('success'))
        <script>
            alert(session('success'));
        </script>
    @else
        <script>
            alert(session('error'));
        </script>
    @endif

@endsection
