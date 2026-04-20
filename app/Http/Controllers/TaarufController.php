<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Taaruf;
use Illuminate\Support\Facades\Auth;

class TaarufController extends Controller
{
    public function request(Request $request)
    {
        $active = Taaruf::where('from_user_id', Auth::id())
            ->whereIn('status', ['pending', 'accepted'])
            ->first();

        if ($active) {
            return back()->with('error', 'Kamu masih punya pengajuan aktif. Tunggu keputusan dulu.');
        }
        $request->validate([
            'to_user_id' => 'required|exists:users,id'
        ]);

        $exist = Taaruf::where('from_user_id', Auth::id())
            ->where('to_user_id', $request->to_user_id)
            ->where('status', 'pending')
            ->first();

        if ($exist) {
            return back()->with('error', 'Sudah pernah mengajukan');
        }

        Taaruf::create([
            'from_user_id' => Auth::id(),
            'to_user_id' => $request->to_user_id,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Pengajuan dikirim');
    }

    public function accept($id)
    {
        $t = Taaruf::findOrFail($id);

        // 🔒 hanya target yg boleh accept
        if ($t->to_user_id !== auth::id()) {
            abort(403);
        }

        // step 1: accepted
        $t->update([
            'status' => 'accepted'
        ]);

        // 🔥 step 2: langsung kirim ke mediator
        $t->update([
            'status' => 'mediator'
        ]);

        return back()->with('success', 'Taaruf diterima, sedang diproses mediator');
    }

    public function reject($id)
    {
        $t = Taaruf::findOrFail($id);

        $t->update([
            'status' => 'rejected'
        ]);

        return back()->with('success', 'Taaruf ditolak');
    }
}
