<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationCodeController extends Controller
{
    public function index()
    {
        return view('auth.verification-code');
    }

    public function verify(Request $request)
    {
        $request->validate(
            [
                'code' => 'required|array|size:6',
                'code.*' => 'required'
            ],
            [
                'code.required' => 'Kode verifikasi belum terisi',
                'code.*.required' => 'Kode verifikasi belum terisi'
            ]
        );

        $code = implode('', $request->code);

        if ($code != session('verification_code')) {

            return back()->withErrors([
                'code' => 'Kode verifikasi salah'
            ]);
        }

        return redirect()->route('reset.password');
    }
}
