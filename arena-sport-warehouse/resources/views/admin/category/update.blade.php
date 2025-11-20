@extends('admin.app')

@section('content')
    <header class="px-8 py-5 bg-white drop-shadow-lg drop-shadow-[#00000028]">
        <h1 class="font-semibold text-2xl">Update Category</h1>
    </header>

    <form class="flex flex-row gap-12 mx-20 my-12 bg-white shadow-xl rounded-xl p-7" onsubmit="{{ route('admin.categories.update', ['id' => $category->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="w-3/5 flex flex-col gap-6">
            <h1 class="text-lg font-semibold">Update Category Form</h1>
            <div class="flex flex-col gap-2 w-full">
                <h4 class="font-semibold">Name</h4>
                <input name="name" value="{{ $category->name }}" type="text" placeholder="My Category" class="outline-2 py-2 px-4 rounded-md">
            </div>
            <button type="submit"
                    class="w-full bg-vibrant-orange text-white p-2 rounded-lg hover:opacity-70 transition duration-200">
                Update Category
            </button>
        </div>
        <div class="w-2/5 h-fit outline-2 py-3 px-4 rounded-md flex flex-col gap-4">
            <h4>Image</h4>
            <input name="image" type="image" src="{{ asset('/assets/ic_upload.svg') }}" alt="Input Image Product"
                   class="outline-2 py-2 px-4 rounded-md h-24 mb-2">
        </div>
    </form>

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
