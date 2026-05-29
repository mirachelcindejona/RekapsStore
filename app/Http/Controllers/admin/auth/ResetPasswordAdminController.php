<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResetPasswordAdminController extends Controller
{
    public function index()
    {
        return view('admin.auth.reset-password-admin');
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'password' => 'required|min:6|confirmed'
            ],
            [
                'password.required' =>
                    'Password wajib diisi',

                'password.min' =>
                    'Password harus minimal 6 karakter',

                'password.confirmed' =>
                    'Konfirmasi password tidak sesuai'
            ]
        );

        // ambil user
        $user = User::where(
            'email',
            session('admin_reset_email')
        )->first();

        // cek user
        if (!$user) {

            return redirect('/admin/login');

        }

        // update password
        $user->password = Hash::make(
            $request->password
        );

        $user->save();

        // hapus session
        session()->forget([
            'admin_reset_email',
            'admin_verification_code'
        ]);

        return redirect('/admin/login')
            ->with(
                'success',
                'Password berhasil diubah'
            );
    }
}