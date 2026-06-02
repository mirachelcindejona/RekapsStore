<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordAdminController extends Controller
{
    public function index()
    {
        return view('admin.auth.forgot-password-admin');
    }

    public function sendCode(Request $request)
    {
        // validasi
        $request->validate(
            [
                'email' => 'required|email'
            ],
            [
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Format email tidak valid'
            ]
        );

        // cek admin / pengurus
        $user = User::role([
            'admin',
            'pengurus'
        ])
        ->where('email', $request->email)
        ->first();

        if (!$user) {

            return back()->withErrors([
                'email' => 'Email admin tidak ditemukan'
            ]);

        }

        // generate OTP
        $code = rand(100000, 999999);

        // simpan session
        session([
            'admin_reset_email' => $request->email,
            'admin_verification_code' => $code
        ]);

        // kirim email
        Mail::raw(
            "Kode verifikasi admin: $code",
            function ($message) use ($request) {

                $message->to($request->email)
                    ->subject('Reset Password Admin');

            }
        );

        return redirect()->route(
            'admin.verification.code'
        );
    }
}