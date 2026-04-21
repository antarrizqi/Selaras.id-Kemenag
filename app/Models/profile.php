<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    // model di bagian crate profile
    protected $fillable = [
        'user_id',
        'alamat_domisili',
        'kota_domisili',
        'tinggi_badan',
        'berat_badan',
        'warna_kulit',
        'suku',
        'deskripsi_diri',
        'hobi',
        'organisasi',
        'kelebihan',
        'kekurangan',
        'aktivitas_harian',
        'riwayat_penyakit',
        'status_pernikahan',
        'jumlah_anak',
        'kriteria_pasangan',
        'status',
        'jenis_kelamin',
        'foto_profil',
        'visi_misi_pernikahan',
      

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
