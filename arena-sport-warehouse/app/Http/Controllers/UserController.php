<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(UserRegisterRequest $request) {
        $data = $request->validated();

        if (User::where('email', $data['email'])->exists()) {
            return redirect()->back()->with('error', 'Email sudah terdaftar!');
        }

        User::create([
            'email' => $data['email'],
            'full_name' => $data['full_name'],
            'password_hash' => Hash::make($data['password']),
            'role' => 'user'
        ]);

        return redirect()->route('login')->with('success', 'Berhasil mendaftar akun!');
    }

    public function login(UserLoginRequest $request) {
        $data = $request->validated();

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password_hash)) {
            return redirect()->back()->with('error', 'Email atau password salah!');
        }

        if ($user->role == 'user') {
            return redirect()->route('profile')->with('success', 'Berhasil login!');
        } else {
            return redirect()->route('admin')->with('success', 'Berhasil login!');
        }
    }
}
