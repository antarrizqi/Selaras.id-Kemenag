<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('alamat_domisili')->nullable();
            $table->string('kota_domisili')->nullable();

            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();

            $table->string('warna_kulit')->nullable();
            $table->string('suku')->nullable();

            $table->text('deskripsi_diri')->nullable();
            $table->string('hobi')->nullable();
            $table->string('organisasi')->nullable();

            $table->text('kelebihan')->nullable();
            $table->text('kekurangan')->nullable();
            $table->text('aktivitas_harian')->nullable();

            $table->text('riwayat_penyakit')->nullable();

            $table->string('status_pernikahan')->nullable();
            $table->integer('jumlah_anak')->nullable();

            $table->text('kriteria_pasangan')->nullable();

            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
