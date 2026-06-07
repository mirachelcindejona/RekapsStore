<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        // Cek user exist
        if (!$user) {
            return back()->withErrors(['username' => 'Username atau Password salah'])->withInput();
        }

        // Cek status banned/nonaktif
        if ($user->status !== 'active') {
            return back()->withErrors(['username' => 'Akun Anda dinonaktifkan atau diblokir.'])->withInput();
        }

        // Cek role — customer tidak boleh login di sini
        if (!$user->hasRole('customer')) {
            return back()->withErrors(['username' => 'Silakan login melalui panel admin.'])->withInput();
        }

        // Attempt login
        if (!Auth::attempt(['username' => $request->username, 'password' => $request->password, 'status' => 'active'])) {
            return back()->withErrors(['username' => 'Username atau Password salah'])->withInput();
        }

        // Regenerate session SEBELUM redirect (fix page expired)
        $request->session()->regenerate();
        return redirect('/home')->with('success', 'Login berhasil! Selamat datang kembali.');
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
