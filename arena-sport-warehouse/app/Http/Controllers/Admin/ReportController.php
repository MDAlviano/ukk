<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // fungsi untuk mengambil data order hari ini
    public function index()
    {
        $today = Carbon::today();
        $date = $today->translatedFormat('d F Y');

        $orders = Order::with('users')
            ->whereDate('created_at', $today)
            ->take(3)
            ->get();

        $totalRevenue = $orders->sum('final_price');

        $currentMonth = Carbon::now()->month;
        $currentYear  = Carbon::now()->year;

        return view('admin.report.index', compact(['date', 'orders', 'totalRevenue', 'currentMonth', 'currentYear']));
    }

    // fungsi untuk mengambil data order per bulan
    public function monthly(Request $request)
    {
        $month = $request->input('month', Carbon::now()->month);
        $year  = $request->input('year', Carbon::now()->year);

        $startOfMonth = Carbon::createFromDate($year, $month, 1)->startOfMonth();
        $endOfMonth   = $startOfMonth->copy()->endOfMonth();

        $orders = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->whereIn('status', ['processing', 'shipped', 'completed'])
            ->get();

        $totalRevenue = $orders->sum('final_price');
        $totalOrders  = $orders->count();

        $monthName = Carbon::createFromDate($year, $month, 1)->translatedFormat('F Y');

        return response()->json([
            'month_name'    => $monthName,
            'total_revenue' => $totalRevenue,
            'total_orders'  => $totalOrders,
        ]);
    }
}
