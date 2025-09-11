@extends('admin.app')

@section('content')
    <header class="px-8 py-5 bg-white drop-shadow-lg drop-shadow-[#00000028]">
        <h1 class="font-semibold text-2xl">Orders</h1>
    </header>

    <div class="m-10 flex flex-col gap-8">

        <!-- filter -->
        <div class="flex flex-row gap-6">
            <div class="flex flex-row gap-4 px-3 py-2 rounded-md border-[1.5px] border-dark-gray">
                <h5>Select Date</h5>
                <input type="date">
            </div>
            <select name="" id="" class="flex flex-row gap-4 pl-3 pr-8 py-2 rounded-md border-[1.5px] border-dark-gray">
                <option value="">Category</option>
            </select>
            <select name="" id="" class="flex flex-row gap-4 pl-3 pr-8 py-2 rounded-md border-[1.5px] border-dark-gray">
                <option value="">Status</option>
            </select>
        </div>

        <!-- list orders -->
        <div class="flex flex-col gap-4">

            <!-- order item -->
            <div class="w-full h-fit bg-white rounded-lg drop-shadow-lg py-3 px-8 flex flex-col gap-3">
                <div class="flex flex-row justify-between text-[#B6B6B6]">
                    <h5>Id</h5>
                    <h5>Created</h5>
                    <h5>Customer</h5>
                    <h5>Total Price</h5>
                    <h5>Status Order</h5>
                </div>
                <span class="bg-[#B6B6B6] opacity-70 w-full h-[1px]"></span>
                <div class="flex flex-row justify-between">
                    <h5>#12A23</h5>
                    <div class="w-fit h-fit flex flex-col gap-1">
                        <h5>07 Sep</h5>
                        <h5 class="text-sm text-[#B6B6B6]">20:48</h5>
                    </div>
                    <div class="w-fit h-fit flex flex-col gap-1">
                        <h5>Detryalviano</h5>
                        <h5 class="text-sm text-[#B6B6B6]">mdetry@gmail.com</h5>
                    </div>
                    <h5>Rp 1.500.000</h5>
                    <h5><i>Pending</i></h5>
                </div>
                <span class="bg-[#B6B6B6] opacity-70 w-full h-[1px]"></span>
                <a href="" class="text-[#B6B6B6] hover:underline">Details...</a>
            </div>

        </div>
    </div>

@endsection