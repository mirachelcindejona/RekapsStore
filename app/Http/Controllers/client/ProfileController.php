<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'gender'   => 'nullable|string',
        ]);

        $user->name     = $request->name;
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->gender   = $request->gender;

        if ($request->hasFile('photo')) {
            if ($user->profile_photo) {
                Storage::delete($user->profile_photo);
            }
            $user->profile_photo = $request->file('photo')->store('profile_photos', 'public');
        }

        $user->save();

        return redirect('/profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function notifications()
    {
        // dummy untuk sekarang, nanti disambung ke tabel notifications
        $notifications = collect([]);
        return view('profile-notifications', compact('notifications'));
    }

    public function markAllRead()
    {
        // nanti disambung ke DB
        return redirect('/profile/notifications')->with('success', 'Semua notifikasi telah dibaca.');
    }

    public function orders(Request $request)
    {
        $search = $request->get('search');
        $orders = \App\Models\OnlineOrder::with(['items.product.images', 'items.variant'])
            ->where('user_id', auth()->id())
            ->when($search, function ($q) use ($search) {
                $q->whereHas('items.product', fn($q) => $q->where('name', 'like', "%$search%"));
            })
            ->latest()
            ->get();

        return view('profile-orders', compact('orders', 'search'));
    }
}