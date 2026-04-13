<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.profile', compact('user'));
    }

    public function create()
    {
        $user = Auth::user();

        // 🔒 kalau sudah punya CV → block
        if ($user->profile) {
            return redirect('/user')->with('error', 'Kamu sudah punya CV');
        }

        return view('profile.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        //  anti duplicate CV
        if ($user->profile) {
            return redirect('/user')->with('error', 'CV sudah ada');
        }
        // handle foto_profil upload
        if ($request->hasFile('foto_profil')) {
            $path = $request->file('foto_profil')->store('profiles', 'public');
            $validated['foto_profil'] = $path;
        }

        $validated = $request->validate([
            'alamat_domisili' => 'nullable|string|max:255',
            'kota_domisili' => 'nullable|string|max:255',
            'tinggi_badan' => 'nullable|integer',
            'berat_badan' => 'nullable|integer',
            'warna_kulit' => 'nullable|string|max:255',
            'suku' => 'nullable|string|max:255',
            'deskripsi_diri' => 'nullable|string',
            'hobi' => 'nullable|string|max:255',
            'organisasi' => 'nullable|string|max:255',
            'kelebihan' => 'nullable|string',
            'kekurangan' => 'nullable|string',
            'aktivitas_harian' => 'nullable|string',
            'riwayat_penyakit' => 'nullable|string',
            'status_pernikahan' => 'nullable|string|max:255',
            'jumlah_anak' => 'nullable|integer',
            'kriteria_pasangan' => 'nullable|string',
            'jenis_kelamin' => 'nullable|string|max:255',
            'foto_profil' => 'nullable|image|max:2048',
            'visi_misi_pernikahan' => 'nullable|string',

        ]);

        // validasi system field
        $validated['user_id'] = $user->id;
        $validated['status'] = 'pending';

        Profile::create($validated);

        return redirect('/user')->with('success', 'CV berhasil dibuat');
    }

    public function show($id)
    {
        $profile = Profile::where('user_id', $id)->firstOrFail();
        return view('profile.show', compact('profile'));
    }

    public function edit($id)
    {
        $profile = Profile::where('user_id', $id)->firstOrFail();

        //  kalau sudah approved → tidak bisa edit
        if ($profile->status === 'approved') {
            return redirect('/user')->with('error', 'CV sudah disetujui, tidak bisa diubah');
        }

        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::where('user_id', $id)->firstOrFail();

        //  lock kalau approved
        if ($profile->status === 'approved') {
            return redirect('/user')->with('error', 'CV sudah disetujui, tidak bisa diubah');
        }

        $validated = $request->validate([
            'alamat_domisili' => 'nullable|string|max:255',
            'kota_domisili' => 'nullable|string|max:255',
            'tinggi_badan' => 'nullable|integer',
            'berat_badan' => 'nullable|integer',
            'warna_kulit' => 'nullable|string|max:255',
            'suku' => 'nullable|string|max:255',
            'deskripsi_diri' => 'nullable|string',
            'hobi' => 'nullable|string|max:255',
            'organisasi' => 'nullable|string|max:255',
            'kelebihan' => 'nullable|string',
            'kekurangan' => 'nullable|string',
            'aktivitas_harian' => 'nullable|string',
            'riwayat_penyakit' => 'nullable|string',
            'status_pernikahan' => 'nullable|string|max:255',
            'jumlah_anak' => 'nullable|integer',
            'kriteria_pasangan' => 'nullable|string',
            'jenis_kelamin' => 'nullable|string|max:255',
            'foto_profil' => 'nullable|image|max:2048',
            'visi_misi_pernikahan' => 'nullable|string',

        ]);
        $validated['status'] = 'pending';


        $profile->update($validated);

        return redirect('/user')->with('success', 'CV berhasil diperbarui');
    }

    public function destroy($id)
    {
        $profile = Profile::where('user_id', $id)->firstOrFail();
        $profile->delete();

        return redirect('/user')->with('success', 'CV berhasil dihapus');
    }
}
