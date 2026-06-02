<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required', 
            'username' => 'required|unique:users', 
            'email' => 'required|email|unique:users', 
            'password' => 'required|min:6',
            ]);

        User::create([
            'name' => $request->name, 
            'username' => $request->username, 
            'email' => $request->email, 
            'password' => $request->password, 
            'role' => 'customer', 
            'status' => 'active',]);
        return redirect('/login');
    }
}
