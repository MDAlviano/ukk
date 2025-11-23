<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // fungsi untuk mengambil data order dan mengembalikan di view 'admin.home.index'
    public function index()
    {
        $user = Auth::user();

        $today = Carbon::today();
        $date = $today->translatedFormat('d F Y');

        $orders = Order::with('users')
            ->whereDate('created_at', $today)
            ->take(3)
            ->get();

        $totalRevenue = $orders->sum('final_price');
        $totalOrders = $orders->count();

        return view('admin.home.index', compact(['date', 'user', 'totalRevenue', 'totalOrders', 'orders']))->with('success', 'Berhasil mengambil semua data.');
    }
}
