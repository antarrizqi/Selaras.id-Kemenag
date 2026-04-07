<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    // tampilkan halaman register
    public function showRegister()
    {
        return view('register');
    }

    // proses register
    public function register()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed',
        ]);

        $data['password'] = Hash::make($data['password']);

        // PAKSA JADI USER
        $data['role'] = 'user';

        $user = User::create($data);

        Auth::login($user);

        return redirect('/user');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login()
    {
        $credentials = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            request()->session()->regenerate();

            $user = Auth::user();

            // ROLE REDIRECT
            if ($user->role === 'admin') {
                return redirect('/admin');
            }

            if ($user->role === 'mediator') {
                return redirect('/mediator');
            }

            return redirect('/user');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah'
        ]);
    }
}
