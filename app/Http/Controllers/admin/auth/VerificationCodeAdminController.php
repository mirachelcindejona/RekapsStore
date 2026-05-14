<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationCodeAdminController extends Controller
{
    public function index()
    {
        return view('admin.auth.verification-code-admin');
    }

    public function verify(Request $request)
    {
        $request->validate(
            [
                'code' => 'required|array|size:6',
                'code.*' => 'required'
            ],
            [
                'code.required' => 'Kode verifikasi wajib diisi',
                'code.*.required' => 'Kode verifikasi wajib diisi'
            ]
        );

        $code = implode('', $request->code);

        if (
            $code != session('admin_verification_code')
        ) {

            return back()->withErrors([
                'code' => 'Kode verifikasi salah'
            ]);

        }

        return redirect()->route(
            'admin.reset.password'
        );
    }
}