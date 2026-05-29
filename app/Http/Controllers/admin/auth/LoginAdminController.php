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

        return redirect('/admin');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}