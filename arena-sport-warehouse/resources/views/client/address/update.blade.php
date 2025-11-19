@extends('client.profile.app')

@section('content')
    <header class="px-8 py-5 bg-white drop-shadow-lg drop-shadow-[#00000028]">
        <h1 class="font-semibold text-2xl">Update Address</h1>
    </header>

    <form class="flex flex-col gap-4 mx-20 my-12 bg-white shadow-xl rounded-xl p-7" onsubmit="">
        <div class="flex flex-row gap-4 w-full">
            <div class="flex flex-col gap-1">
                <h3 class="font-semibold text-dark-gray">Recipient Name</h3>
                <input type="text" placeholder="..." class="w-full outline-2 py-2 px-4 rounded-md">
            </div>
            <div class="flex flex-col gap-1">
                <h3 class="font-semibold text-dark-gray">Address</h3>
                <input type="text" placeholder="..." class="w-full outline-2 py-2 px-4 rounded-md">
            </div>
        </div>
        <div class="flex flex-row gap-4 w-full">
            <div class="flex flex-col gap-1">
                <h3 class="font-semibold text-dark-gray">City</h3>
                <input type="text" placeholder="..." class="w-full outline-2 py-2 px-4 rounded-md">
            </div>
            <div class="flex flex-col gap-1">
                <h3 class="font-semibold text-dark-gray">Postal Code</h3>
                <input type="text" placeholder="..." class="w-full outline-2 py-2 px-4 rounded-md">
            </div>
        </div>
        <div class="flex flex-row gap-4 w-full">
            <h3 class="font-semibold text-dark-gray">Additional Information (Opsional)</h3>
            <textarea type="text" placeholder="..." class="w-full outline-2 py-2 px-4 rounded-md" rows="5">
        </div>
        <button type="submit" class="w-full bg-vibrant-orange text-white p-2 rounded-lg hover:opacity-70 transition duration-200">Update</button>
    </form>
@endsection
