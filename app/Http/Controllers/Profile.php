<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Profile extends Controller
{
    public function index()
    {
        return view('profile.profile');
    }

    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
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
        ]);

        $profile = new \App\Models\Profile($validatedData);
        $profile->user_id = \Illuminate\Support\Facades\Auth::id();
        $profile->save();

        return redirect()->route('profile.index')->with('success', 'Profile berhasil dibuat!');
    }

    public function show($id)
    {
        $profile = \App\Models\Profile::where('user_id', $id)->firstOrFail();
        return view('profile.show', compact('profile'));
    }

    public function edit($id)
    {
        $profile = \App\Models\Profile::where('user_id', $id)->firstOrFail();
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
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
        ]);

        // Update data di database
        $profile = \App\Models\Profile::where('user_id', $id)->firstOrFail();
        $profile->update($validatedData);

        return redirect()->route('profile.index')->with('success', 'Profile berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $profile = \App\Models\Profile::where('user_id', $id)->firstOrFail();
        $profile->delete();

        return redirect()->route('profile.index')->with('success', 'Profile berhasil dihapus!');
    }
}
