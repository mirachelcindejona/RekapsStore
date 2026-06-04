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
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials['status'] = 'active';

        if (Auth::attempt($credentials)) {
            
            $user = Auth::user();

            // Cek role via Spatie
            if (!$user->hasRole('customer')) {
                Auth::logout();
                return back()->withErrors([
                    'username' => 'Silakan login melalui panel admin.'
                ]);
            }

            $request->session()->regenerate();
            return redirect('/admin');
        }

        $userExists = User::where('username', $request->username)->first();
        if ($userExists && $userExists->status !== 'active') {
            return back()->withErrors([
                'username' => 'Akun Anda dinonaktifkan atau diblokir.'
            ])->withInput();
        }

        return back()->withErrors([
            'username' => 'Username atau Password salah'
        ])->withInput();
    }
}