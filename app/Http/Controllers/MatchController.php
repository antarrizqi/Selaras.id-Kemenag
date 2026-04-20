<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class MatchController
{
    public function index()
    {
        $user = Auth::user();

        if (!$user->profile || $user->profile->status !== 'approved') {
            return redirect('/user');
        }

        // 🔥 NORMALISASI DATA
        $gender = strtolower($user->profile->jenis_kelamin);

        $target = $gender === 'laki-laki' ? 'perempuan' : 'laki-laki';

        $candidates = Profile::with('user')
            ->where('status', 'approved')
            ->where('user_id', '!=', $user->id)
            ->whereRaw('LOWER(jenis_kelamin) = ?', [$target])
            ->get();

        $sent = \App\Models\Taaruf::with('toUser')
            ->where('from_user_id', $user->id)
            ->latest()
            ->get();

        return view('matches.index', compact('candidates', 'sent'));
    }
}
