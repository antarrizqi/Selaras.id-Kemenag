<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('alamat_domisili');
            $table->string('kota_domisili');

            $table->integer('tinggi_badan');
            $table->integer('berat_badan');

            $table->string('warna_kulit');
            $table->string('suku');

            $table->text('deskripsi_diri');
            $table->string('hobi');
            $table->string('organisasi');

            $table->text('kelebihan');
            $table->text('kekurangan');
            $table->text('aktivitas_harian');

            $table->text('riwayat_penyakit');

            $table->string('status_pernikahan');
            $table->integer('jumlah_anak');

            $table->text('kriteria_pasangan');

            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');

            $table->string('jenis_kelamin');

            $table->string('foto_profil');

            $table->text('visi_misi_pernikahan');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
