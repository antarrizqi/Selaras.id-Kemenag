<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //  DASHBOARD ADMIN
    public function index()
    {
        $profiles = Profile::with('user')->latest()->get();

        return view('dashboard.admin', compact('profiles'));
    }

    //  APPROVE USER
    public function approve($id)
    {
        $profile = Profile::findOrFail($id);

        $profile->update([
            'status' => 'approved'
        ]);

        return back()->with('success', 'User berhasil di-approve');
    }

    //  REJECT USER
    public function reject($id)
    {
        $profile = Profile::findOrFail($id);

        $profile->update([
            'status' => 'rejected'
        ]);

        return back()->with('error', 'User ditolak');
    }

    //  LIHAT DETAIL PROFILE
    public function show($id)
    {
        $profile = Profile::with('user')->findOrFail($id);

        return view('profile.show', compact('profile'));
    }

    //  BUAT MEDIATOR BARU
    public function createMediator(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'phone' => 'required'
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'role' => 'mediator'
        ]);

        return back()->with('success', 'Mediator berhasil dibuat');
    }

    //  JADIKAN USER SEBAGAI MEDIATOR
    public function makeMediator($id)
    {
        $user = User::findOrFail($id);

        // Absolut admin, tidak bisa diubah menjadi mediator
        if ($user->role === 'admin') {
            return back()->with('error', 'Admin tidak bisa diubah');
        }

        $user->update([
            'role' => 'mediator'
        ]);

        return back()->with('success', 'User sekarang menjadi mediator');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        // Ganti 'admin.users.index' dengan nama route daftar user kamu
         return back()->with('success', 'User sudah dihapus');
    }
}
