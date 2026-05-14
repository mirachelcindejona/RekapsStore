<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{

    public function index()
    {
        return view('auth.forgot-password');
    }

    public function sendCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        // cek email user
        $user = User::query()
            ->where('email', $request->email)
            ->first();

        // email tidak ditemukan
        if (!$user) {

            return back()->withErrors([
                'email' => 'Email tidak ditemukan'
            ]);
        }

        // generate kode
        $code = rand(100000, 999999);

        // simpan session
        session([
            'reset_email' => $request->email,
            'verification_code' => $code
        ]);

        // kirim email
        Mail::raw(
            "Kode verifikasi reset password kamu adalah: $code",
            function ($message) use ($request) {

                $message->to($request->email)
                    ->subject('Reset Password');
            }
        );

        return redirect()->route('verification.code');
    }
}
