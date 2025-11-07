<div class="w-full h-fit bg-white rounded-lg drop-shadow-lg py-3 px-8 flex flex-col gap-3">
    <div class="grid grid-cols-5 gap-x-8 text-[#B6B6B6]">
        <h5>Id</h5>
        <h5 class="text-center">Created</h5>
        <h5 class="text-left">Customer</h5>
        <h5 class="text-right">Total Price</h5>
        <h5 class="text-center">Status Order</h5>
    </div>
    <span class="bg-[#B6B6B6] opacity-70 w-full h-[1px]"></span>
    <div class="grid grid-cols-5 gap-x-8">
        <h5>{{ $id }}</h5>
        <div class="flex flex-col gap-1 text-center">
            <h5>{{ $date }}</h5>
            <h5 class="text-sm text-[#B6B6B6]">{{ $time }}</h5>
        </div>
        <div class="flex flex-col gap-1">
            <h5>{{ $name }}</h5>
            <h5 class="text-sm text-[#B6B6B6]">{{ $email }}</h5>
        </div>
        <h5 class="text-right">Rp {{ number_format($price) }}</h5>
        <h5 class="text-center"><i>{{ $status }}</i></h5>
    </div>
    <span class="bg-[#B6B6B6] opacity-70 w-full h-[1px]"></span>
    <a href="/admin/orders/orderId" class="text-[#B6B6B6] hover:underline">Details...</a>
</div>
