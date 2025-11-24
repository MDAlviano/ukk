@if($categories->isEmpty())
    <div class="px-20 py-52 flex flex-col items-center gap-2">
        <img src="{{ asset('/assets/ic_box-gray.svg') }}" alt="box" class="opacity-80 w-12">
        <h1 class="font-medium text-dark-gray opacity-80">
            Kategori tidak ditemukan untuk {{ request('search') ?? 'pencarian ini' }}.
        </h1>
    </div>
@else
    <div class="grid grid-cols-2 gap-x-6">
        @foreach($categories as $category)
            <div class="relative w-full h-64 rounded-xl overflow-hidden shadow-lg group my-3">
                <img src="{{ asset('/storage/' . $category->image_url) }}"
                     alt="{{ $category->name }}"
                     class="absolute w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">

                <div class="absolute inset-0 flex flex-col justify-between p-6 text-white w-1/2 backdrop-blur-md">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-3xl font-bold drop-shadow-md">{{ $category->name }}</h3>
                            <p class="text-lg drop-shadow">{{ $category->products->count() }} products</p>
                        </div>
                    </div>

                    <a href="{{ route('categories.show', ['slug' => $category->slug]) }}"
                       class="hover:opacity-80 transition duration-200">
                        <div class="flex flex-row gap-2 items-center">
                            <h1 class="text-xl">Jelajahi</h1>
                            <img src="{{ asset('/assets/ic_chevron-right.svg') }}" alt="explore" class="size-7">
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endif
