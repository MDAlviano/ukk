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
                <p class="text-lg font-medium">Email : {{ $user->email }}</p>
                <p class="text-lg font-medium">Name : {{ $user->full_name }}</p>
                <p class="text-lg font-medium">Phone : {{ $user->phone }}</p>
            </div>
        </div>
        <div class="flex flex-col gap-5 outline-2 outline-gray-300 rounded-xl p-6">
            <a href="/profile/add-address" class="flex flex-row gap-3 hover:opacity-70 transition duration-200">
                <img src="{{ asset('assets/plus.svg') }}" alt="add">
                <h1 class="font-semibold text-lg">Create New Address</h1>
            </a>
            {{-- list addresses --}}
            @if($addresses->isEmpty())
                <p class="w-full font-medium text-gray-400 text-center">Alamat masih kosong.</p>
            @else
                <div class="flex flex-col gap-3">
                    {{-- item --}}
                    @foreach($addresses as $address)
                        <div class="flex flex-col gap-2 px-5 py-3 rounded-lg border-[1px] border-dark-gray text-dark-gray">
                            <h1 class="font-medium text-lg">{{ $address->recipient_name }}</h1>
                            <h1 class="font-medium text-lg">{{ $address->address }}</h1>
                            <p>{{ $address->city }}, {{ $address->province }} - {{ $address->country }} ({{ $address->postal_code }})</p>
                            <p>{{ $address->additional_information ? $address->additional_information : '-' }}</p>
                            <div class="flex flex-row gap-2">
                                <div class="flex flex-row gap-2 items-center">
                                    <a href="{{ route('address.edit', ['id' => $address->id]) }}" class="text-gray-500 font-medium hover:underline">Edit</a>
                                    <img src="{{ asset('/assets/ic_edit-gray.svg') }}" alt="edit" class="size-4">
                                </div>
                                <div class="flex flex-row gap-1 items-center">
                                    <form action="{{ route('address.delete', ['id' => $address->id]) }}"
                                          method="POST" onsubmit="return confirm('Apakah anda yakin menghapus alamat {{ $address->address }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 font-medium hover:underline">Delete</button>
                                    </form>
                                    <img src="{{ asset('/assets/ic_edit-red.svg') }}" alt="edit" class="size-4">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

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
