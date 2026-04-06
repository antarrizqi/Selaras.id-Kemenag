<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
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

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
