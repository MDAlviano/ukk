<div class="flex flex-col gap-2 px-5 py-3 rounded-lg border-[1px] border-dark-gray text-dark-gray">
    <h1 class="font-medium text-lg">{{ $address }}</h1>
    <p>{{ $city }}, {{ $province }} - {{ $country }} ({{ $postalCode }})</p>
    <p>{{ $additionalInfo }}</p>
    <div class="flex flex-row gap-2 items-center">
        <a href="/" class="text-gray-500 font-medium hover:underline">Edit</a>
        <img src="{{ asset('/assets/ic_edit-gray.svg') }}" alt="edit" class="size-4">
    </div>
</div>
