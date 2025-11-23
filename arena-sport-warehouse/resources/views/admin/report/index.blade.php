@extends('admin.app')

@section('content')
    <header class="px-8 py-5 bg-white drop-shadow-lg drop-shadow-[#00000028]">
        <h1 class="font-semibold text-2xl">Reports</h1>
    </header>

    <div class="flex flex-row justify-between gap-8 m-10">
        {{-- first section --}}
        <div class="w-fit rounded-lg p-8 flex flex-col gap-4 shadow-md">
            <div class="flex flex-row gap-3">
                <img src="{{ asset('/assets/Calendar.svg') }}" alt="calendar" class="w-10">
                <div class="flex flex-col">
                    <h1 class="text-2xl font-semibold">Hari ini</h1>
                    <h1 class="text-lg font-semibold">{{ $date }}</h1>
                </div>
            </div>
            <p class="opacity-75">Ini adalah total pemasukan dan beberapa pesanan di hari ini.</p>
            <span class="w-full h-[1px] bg-dark-gray opacity-50"></span>
            {{-- total revenue --}}
            <div class="flex flex-col font-semibold">
                <h1 class="text-xl opacity-80">Total Pemasukan</h1>
                <h5 class="text-2xl">Rp{{ number_format($totalRevenue, 0, ',', '.') }}</h5>
            </div>
            {{-- total order --}}
            <div class="flex flex-col font-semibold">
                <h1 class="text-xl opacity-80">Total Order</h1>
                <h5 class="text-2xl">{{ $orders->count() }}</h5>
            </div>
            <span class="w-full h-[1px] bg-dark-gray opacity-50"></span>
            <h1 class="text-2xl font-semibold">Orders</h1>
            {{-- orders --}}
            <div class="flex flex-col gap-2">
                {{-- item --}}
                @if($orders->isEmpty())
                    <p class="w-full items-center text-gray-400 font-medium text-center">Belum ada</p>
                @else
                    @foreach($orders as $order)
                        <div class="p-3 flex-col gap-1 shadow-sm rounded-md">
                            <a href="/" class="font-medium opacity-50">{{ $order->order_number }}
                                - {{ $order->status }}</a>
                            <div class="flex flex-row justify-between w-full font-semibold">
                                <p>{{ $order->users->full_name }}</p>
                                <p>Rp{{ number_format($order->final_price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        {{-- second section --}}
        <div class="w-full flex flex-col gap-7">
            <div class="rounded-lg p-8 flex flex-col gap-4 shadow-md">
                <select id="month-select" class="w-1/3 text-2xl font-semibold">
                    @for($m = 1; $m <= 12; $m++)
                        @php $date = Carbon\Carbon::create(null, $m, 1) @endphp
                        <option value="{{ $m }}" {{ $m == $currentMonth ? 'selected' : '' }}>
                            {{ $date->translatedFormat('F') }}
                        </option>
                    @endfor
                </select>
                <p class="opacity-75">Total penjualan pada bulan terpilih.</p>
                <span class="w-full h-[1px] bg-dark-gray opacity-50"></span>
                {{-- total revenue --}}
                <div class="flex flex-col font-semibold">
                    <h1 class="text-xl opacity-80">Total Revenue</h1>
                    <h5 id="monthly-revenue" class="text-2xl">Rp0</h5>
                </div>
                {{-- total orders --}}
                <div class="flex flex-col font-semibold">
                    <h1 class="text-xl opacity-80">Total Orders</h1>
                    <h5 id="monthly-orders" class="text-2xl">0</h5>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const monthSelect = document.getElementById('month-select');
        const revenueEl = document.getElementById('monthly-revenue');
        const ordersEl = document.getElementById('monthly-orders');

        function loadMonthlyReport() {
            const month = monthSelect.value;
            const year = new Date().getFullYear();

            axios.get('{{ route("admin.report.monthly") }}', {
                params: {month, year}
            })
                .then(res => {
                    revenueEl.textContent = 'Rp' + Number(res.data.total_revenue).toLocaleString('id-ID');
                    ordersEl.textContent = res.data.total_orders.toLocaleString('id-ID');
                    exportMonthName.textContent = res.data.month_name;
                });
        }

        // Load saat pilih bulan
        monthSelect.addEventListener('change', loadMonthlyReport);

        // Load pertama kali
        loadMonthlyReport();
    </script>
@endsection
