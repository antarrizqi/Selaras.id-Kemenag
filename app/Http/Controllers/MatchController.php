<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MatchController
{
    public function index()
    {
        $user = auth::user();

        $userGender = $user->profile->jenis_kelamin;

        // cari lawan gender
        $targetGender = $userGender === 'laki-laki' ? 'perempuan' : 'laki-laki';

        $candidates = \App\Models\Profile::with('user')
            ->where('status', 'approved')
            ->where('jenis_kelamin', $targetGender)
            ->where('user_id', '!=', $user->id)
            ->get();

        return view('matches.index', compact('candidates'));
    }
}
