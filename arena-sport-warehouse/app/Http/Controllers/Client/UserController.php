<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $data = $request->validated();

        if (User::where('email', $data['email'])->exists()) {
            return redirect()->back()->with('error', 'Email sudah terdaftar!');
        }

        User::create([
            'email' => $data['email'],
            'full_name' => $data['full_name'],
            'phone' => $data['phone'],
            'password_hash' => Hash::make($data['password']),
            'role' => 'user'
        ]);

        return redirect()->route('login')->with('success', 'Berhasil mendaftar! Silakan login.');
    }

    public function login(UserLoginRequest $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $remember = true;

        if (!Auth::attempt($credentials, $remember)) {
            return redirect()->back()->with('error', 'Email atau password salah!');
        }

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'Selamat datang, Admin!');
        }

        return redirect()->route('profile')->with('success', 'Login berhasil!');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('landing')->with('success', 'Berhasil logout!');
    }

    public function edit()
    {
        $user = Auth::user();

        return view('client.profile.update', compact('user'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'nullable',
            'phone' => 'required',
        ]);

        $user = Auth::user();
        $user->full_name = $data['full_name'];
        $user->phone = $data['phone'];
        $user->save();

        return redirect()->route('profile')->with('success', 'Berhasil mengupdate profil!');
    }
}
