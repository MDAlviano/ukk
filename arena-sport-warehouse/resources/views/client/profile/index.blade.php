@extends('client.profile.app')

@section('content')
    <div class="flex flex-col p-10 gap-10">
        <div class="flex flex-row items-center gap-10 outline-2 outline-gray-300 rounded-xl p-6">
            <div class="flex flex-col gap-4">
                <img src="{{ asset('assets/ig_user.png') }}" alt="profile" class="rounded-full size-40">
                <a href="/profile/edit" class="flex flex-row gap-2 items-center justify-center hover:cursor-pointer hover:opacity-70 transition duration-200">
                    <h1 class="font-medium text-lg">Edit Data</h1>
                    <img src="{{ asset('assets/edit.svg') }}" alt="edit">
                </a>
            </div>
            <div class="flex flex-col gap-4">
                <p class="text-lg font-medium">Email : johndoe@gmail.com</p>
                <p class="text-lg font-medium">Name : John Doe</p>
            </div>
        </div>
        <div class="flex flex-col gap-5 outline-2 outline-gray-300 rounded-xl p-6">
            <a href="/profile/add-address" class="flex flex-row gap-3 hover:opacity-70 transition duration-200">
                <img src="{{ asset('assets/plus.svg') }}" alt="add">
                <h1 class="font-semibold text-lg">Create New Address</h1>
            </a>
            {{-- list addresses --}}
            <div class="flex flex-col gap-3">
                {{-- item --}}
                <x-address-card
                    recipientName="Alviano"
                    address="Jl. Kenangan"
                    city="Semarang"
                    province="Jawa Tengah"
                    country="Indonesia"
                    postalCode=50161
                    additionalInfo="..."
                />
            </div>
        </div>
    </div>
@endsection
