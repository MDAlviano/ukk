@foreach($categories as $category)
    {{--  category card  --}}
    <x-category-card
        imageUrl="{{ $category->image_url }}"
        name="{{ $category->name }}"
        products={{ $category->products->count() }}
                slug="{{ $category->slug }}"
    />
@endforeach

@if($categories->isEmpty())
    @if(request('q'))
        <main id="empty" class="px-20 py-52 flex flex-col items-center gap-2">
            <img src="{{ asset('/assets/ic_box-gray.svg') }}" alt="box" class="opacity-80 w-12">
            <h1 class="font-medium text-dark-gray opacity-80">Kategori {{ request('q') }} tidak ditemukan.</h1>
        </main>
    @else
        <main id="empty" class="px-20 py-52 flex flex-col items-center gap-2">
            <img src="{{ asset('/assets/ic_box-gray.svg') }}" alt="box" class="opacity-80 w-12">
            <h1 class="font-medium text-dark-gray opacity-80">Kategori belum tersedia saat ini.</h1>
        </main>
    @endif
@endif
