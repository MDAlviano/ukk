<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Silahkan login terlebih dahulu!');
        }

        if (Auth::user()->role !== 'user') {
            return redirect()->back()->with('error', 'Akses ditolak! Hanya user.');
        }

        return $next($request);
    }
}
