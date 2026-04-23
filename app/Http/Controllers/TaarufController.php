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

        $active = Taaruf::where('from_user_id', Auth::id())
            ->whereIn('status', ['pending', 'mediator'])
            ->exists();

        if ($active) {
            return back()->with('error', 'Selesaikan proses taaruf sebelumnya dulu.');
        }

        return back()->with('success', 'Pengajuan dikirim');
    }

    public function accept($id)
    {
        $taaruf = \App\Models\Taaruf::findOrFail($id);

        // pastikan yang nerima adalah target
        if ($taaruf->to_user_id != auth::id()) {
            abort(403);
        }

        $taaruf->status = 'mediator';
        $taaruf->save();

        return back()->with('success', 'Pengajuan diterima, mediator akan memproses');
    }

    public function reject($id)
    {
        $taaruf = \App\Models\Taaruf::findOrFail($id);

        if ($taaruf->to_user_id != auth::id()) {
            abort(403);
        }

        $taaruf->status = 'rejected';
        $taaruf->save();

        return back()->with('success', 'Pengajuan ditolak');
    }

    public function destroy($id)
    {
        $t = Taaruf::findOrFail($id);
        $t->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }

    public function incomingList()
    {
        $requests = Taaruf::where('to_user_id', Auth::id())
            ->where('status', 'pending')
            ->with('from_user.profile')
            ->get();

        return view('taaruf.incoming', compact('requests'));
    }
}
