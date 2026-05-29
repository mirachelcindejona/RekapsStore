<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class PengurusController extends Controller
{
    public function index()
    {
        $pengurus = User::role([
            'admin',
            'pengurus'
        ])->get();

        $customers = User::role('customer')->get();

        return view(
            'admin.users',
            compact(
                'pengurus',
                'customers'
            )
        );
    }

    public function toggleStatus(User $user)
    {
        if ($user->status == 'active') {

            $user->update([
                'status' => 'banned'
            ]);
        } else {

            $user->update([
                'status' => 'active'
            ]);
        }

        return back();
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'status' => 'required',
        ]);

        $user->syncPermissions(
            $request->permissions ?? []
        );

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Pengurus berhasil diupdate');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'Pengurus berhasil dihapus');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'active',
        ]);

        $user->assignRole('pengurus');

        if ($request->permissions) {
            $user->syncPermissions($request->permissions);
        }

        return redirect()
            ->route('admin.users')
            ->with('success', 'Pengurus berhasil ditambahkan');
    }
}
