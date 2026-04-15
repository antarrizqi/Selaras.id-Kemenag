<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Profile;

class AdminController extends Controller
{
    // tampil semua profile
    public function index()
    {
        $profiles = \App\Models\Profile::with('user')->latest()->get();

        return view('dashboard.admin', compact('profiles'));
    }

    // approve
    public function approve($id)
    {
        $profile = Profile::findOrFail($id);

        $profile->status = 'approved';
        $profile->save();

        return back()->with('success', 'User berhasil di-approve');
    }

    // reject
    public function reject($id)
    {
        $profile = Profile::findOrFail($id);

        $profile->status = 'rejected';
        $profile->save();

        return back()->with('error', 'User ditolak');
    }

    public function show($id)
    {
        $profile = \App\Models\Profile::with('user')->findOrFail($id);

        return view('admin.show', compact('profile')); 
    }
    
    public function createMediator(Request $request)
{
    \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'mediator'
    ]);

    return back();
}
}
