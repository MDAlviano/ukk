<div class="flex flex-col gap-2 px-5 py-3 rounded-lg border-[1px] border-dark-gray text-dark-gray">
    <h1 class="font-medium text-lg">{{ $address }}</h1>
    <p>{{ $city }}, {{ $province }} - {{ $country }} ({{ $postalCode }})</p>
    <p>{{ $additionalInfo ? $additionalInfo : '-' }}</p>
    <div class="flex flex-row gap-2">
        <div class="flex flex-row gap-2 items-center">
            <a href="{{ route('address.edit', ['address' => $address]) }}" class="text-gray-500 font-medium hover:underline">Edit</a>
            <img src="{{ asset('/assets/ic_edit-gray.svg') }}" alt="edit" class="size-4">
        </div>
        <div class="flex flex-row gap-1 items-center">
            <form action="{{ route('address.delete', ['id' => $id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 font-medium hover:underline">Delete</button>
            </form>
            <img src="{{ asset('/assets/ic_edit-red.svg') }}" alt="edit" class="size-4">
        </div>
    </div>
</div>
