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

        if ($user->profile) {
            return redirect('/user')->with('error', 'Kamu sudah punya CV');
        }

        return view('profile.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->profile) {
            return redirect('/user')->with('error', 'CV sudah ada');
        }

        $validated = $request->validate([
            'alamat_domisili' => 'required|string|max:255',
            'kota_domisili' => 'required|string|max:255',
            'tinggi_badan' => 'required|integer',
            'berat_badan' => 'required|integer',
            'warna_kulit' => 'required|string|max:255',
            'suku' => 'required|string|max:255',
            'deskripsi_diri' => 'required|string',
            'hobi' => 'required|string|max:255',
            'organisasi' => 'required|string|max:255',
            'kelebihan' => 'required|string',
            'kekurangan' => 'required|string',
            'aktivitas_harian' => 'required|string',
            'riwayat_penyakit' => 'required|string',
            'status_pernikahan' => 'required|string|max:255',
            'jumlah_anak' => 'required|integer',
            'kriteria_pasangan' => 'required|string',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'foto_profil' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'visi_misi_pernikahan' => 'required|string',
        ]);

        // upload foto
        if ($request->hasFile('foto_profil')) {

            $file = $request->file('foto_profil');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads'), $filename);

            $validated['foto_profil'] = 'uploads/' . $filename;
        }

        $validated['user_id'] = $user->id;
        $validated['status'] = 'pending';

        Profile::create($validated);

        return redirect('/user')->with('success', 'CV berhasil dibuat');
    }

    public function show($id)
    {
        $profile = \App\Models\Profile::with('user')->findOrFail($id);

        return view('profile.show', compact('profile'));
    }
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);

        if ($profile->user_id !== auth::id()) {
            abort(403);
        }

        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);

        if ($profile->user_id !== auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'alamat_domisili' => 'required|string|max:255',
            'kota_domisili' => 'required|string|max:255',
            'tinggi_badan' => 'required|integer',
            'berat_badan' => 'required|integer',
            'warna_kulit' => 'required|string|max:255',
            'suku' => 'required|string|max:255',
            'deskripsi_diri' => 'required|string',
            'hobi' => 'required|string|max:255',
            'organisasi' => 'required|string|max:255',
            'kelebihan' => 'required|string',
            'kekurangan' => 'required|string',
            'aktivitas_harian' => 'required|string',
            'riwayat_penyakit' => 'required|string',
            'status_pernikahan' => 'required|string|max:255',
            'jumlah_anak' => 'required|integer',
            'kriteria_pasangan' => 'required|string',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',

            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'visi_misi_pernikahan' => 'required|string',
        ]);



        // upload foto baru (optional)
        if ($request->hasFile('foto_profil')) {

            $file = $request->file('foto_profil');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads'), $filename);

            $validated['foto_profil'] = 'uploads/' . $filename;
        }

        $validated['status'] = 'pending';

        $profile->update($validated);

        return redirect('/user')->with('success', 'CV berhasil diperbarui');
    }

    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();

        return redirect('/user')->with('success', 'CV berhasil dihapus');
    }
}
