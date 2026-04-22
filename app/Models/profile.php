<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Profile extends Model
{
    // Pastikan nama table sesuai kalau lo nggak pakai jamak (profiles)
    // protected $table = 'profiles';

    protected $fillable = [
        'user_id',
        'tanggal_lahir',
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

    /**
     * Casting kolom tanggal_lahir biar otomatis jadi object Carbon.
     */
    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    /**
     * Accessor untuk mendapatkan umur secara otomatis.
     * Cara panggil: $profile->umur
     */
    public function getUmurAttribute()
    {
        if (!$this->tanggal_lahir) {
            return '-';
        }

        return $this->tanggal_lahir->age;
    }

    /**
     * Relasi ke User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
