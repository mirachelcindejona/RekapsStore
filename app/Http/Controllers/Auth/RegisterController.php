<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // 1. Buat User baru (status otomatis 'active' dari default database)
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password, // Jika Laravel 11, cast 'hashed' sudah otomatis mengenkripsi ini
        ]);

        // 2. Berikan role menggunakan Spatie
        $user->assignRole('customer');

        // 3. Login otomatis setelah register
        auth()->login($user);

        return redirect('/home')->with('success', 'Pendaftaran berhasil! Selamat datang di Rekaps Store.');
    }
}
