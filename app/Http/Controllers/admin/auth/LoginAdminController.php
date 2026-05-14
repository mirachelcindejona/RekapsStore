<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginAdminController extends Controller
{
    public function index()
    {
        return view('admin.auth.login-admin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $user = User::where(
            'username',
            $request->username
        )->first();

        if (!$user) {

            return back()->withErrors([
                'username' => 'Username tidak ditemukan'
            ])->withInput();
        }

        if (!Hash::check(
            $request->password,
            $user->password
        )) {

            return back()->withErrors([
                'password' => 'Password salah'
            ])->withInput();
        }

        if ($user->role == 'customer') {

            return back()->withErrors([
                'username' => 'Akun ini bukan admin'
            ]);
        }

        Auth::login($user);

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

