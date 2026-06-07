<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginAdminController extends Controller
{
    public function index()
    {
        return view('admin.auth.login-admin');
    }

    public function login(Request $request)
    {
        // validasi
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ],
            [
                'username.required' => 'Username wajib diisi',
                'password.required' => 'Password wajib diisi',
            ]
        );

        // cek user
        $user = User::where(
            'username',
            $request->username
        )->first();

        if (!$user) {

            return back()->withErrors([
                'username' => 'Username tidak ditemukan'
            ])->withInput();
        }

        // cek login
        if (!Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {

            return back()->withErrors([
                'password' => 'Password salah'
            ])->withInput();
        }

        // refresh user
        $user = Auth::user();

        // cek role admin/pengurus
        if (
            !$user->hasAnyRole([
                'admin',
                'pengurus'
            ])
        ) {

            Auth::logout();

            return back()->withErrors([
                'username' => 'Akun ini bukan admin'
            ]);
        }

        // regenerate session
        
        $request->session()->regenerate();

    $user = Auth::user();
    if ($user->hasPermissionTo('dashboard')) {
    return redirect('/admin')->with('success', 'Login berhasil! Selamat datang.');
    }   

// Redirect ke menu pertama yang dia punya akses
if ($user->hasPermissionTo('kasir')) return redirect('/admin/cashier')->with('success', 'Login berhasil! Selamat datang.');
if ($user->hasPermissionTo('produk')) return redirect('/admin/product')->with('success', 'Login berhasil! Selamat datang.');
if ($user->hasPermissionTo('pengguna')) return redirect('/admin/users')->with('success', 'Login berhasil! Selamat datang.');
if ($user->hasPermissionTo('keuangan')) return redirect('/admin/finance')->with('success', 'Login berhasil! Selamat datang.');
if ($user->hasPermissionTo('diskon')) return redirect('/admin/promo')->with('success', 'Login berhasil! Selamat datang.');
if ($user->hasPermissionTo('laporan')) return redirect('/admin/reports')->with('success', 'Login berhasil! Selamat datang.');

// Kalau tidak punya permission apapun
return redirect('/admin/login')->withErrors(['username' => 'Akun belum diberi hak akses.']);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
