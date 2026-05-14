<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

        $user = User::query()
            ->where('username', $request->username)
            ->first();

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

        if ($user->role != 'customer') {
            return back()->withErrors([
                'username' => 'Silakan login melalui admin'
            ]);
        }

        Auth::login($user);
        $request->session()->regenerate();
        return redirect('/');
    }
}
