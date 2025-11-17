<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $date = date('D, d M Y');

        $user = Auth::user();

        $orders = Order::with(['users'])->where('created_at', today());

        $totalRevenue = $orders->sum('total_price');

        $totalOrders = $orders->count();

        return view('admin.home.index', compact(['date', 'user', 'totalRevenue', 'totalOrders']))->with('success', 'Berhasil mengambil semua data.');
    }
}
