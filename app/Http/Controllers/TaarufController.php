<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taaruf;
use Illuminate\Support\Facades\Auth;

class TaarufController
{
    public function request(Request $request)
    {
        Taaruf::create([
            'from_user_id' => auth::id(),
            'to_user_id' => $request->to_user_id,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Pengajuan dikirim');
    }

    public function accept($id)
    {
        $t = Taaruf::findOrFail($id);

        $t->update(['status' => 'accepted']);

        return back()->with('success', 'Taaruf diterima');
    }

    public function reject($id)
    {
        $t = Taaruf::findOrFail($id);

        $t->update(['status' => 'rejected']);

        return back()->with('success', 'Taaruf ditolak');
    }
}
