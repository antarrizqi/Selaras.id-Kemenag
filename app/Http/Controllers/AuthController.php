<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    // ================= REGISTER =================

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|confirmed',
            'phone' => 'required|string|max:20'
        ]);

        // hash password
        $data['password'] = Hash::make($data['password']);

        // default role
        $data['role'] = 'user';

        $user = User::create($data);

        Auth::login($user);

        // 🔥 langsung ke create profile (lebih aman daripada /user)
        return redirect()->route('profile.create');
    }

    // ================= LOGIN =================

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $user = Auth::user();

            // 🔥 ROLE BASED REDIRECT
            if ($user->role === 'admin') {
                return redirect('/admin');
            }

            if ($user->role === 'mediator') {
                return redirect('/mediator');
            }

            // 🔥 USER FLOW
            if (!$user->profile) {
                return redirect()->route('profile.create');
            }

            $status = $user->profile->status;

            if ($status === 'pending') {
                return redirect('/user');
            }

            if ($status === 'rejected') {
                return redirect('/user');
            }

            if ($status === 'approved') {
                return redirect('/match');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah'
        ]);
    }

    // ================= LOGOUT =================

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
