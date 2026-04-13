<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class DummyUserSeeder extends Seeder
{
    public function run(): void
    {
        // DUMMY LAKI-LAKI
        for ($i = 1; $i <= 8; $i++) {

            $user = User::create([
                'name' => 'Dummy Laki '.$i,
                'email' => 'dummy_laki'.$i.'@mail.com',
                'password' => Hash::make('password'),
                'role' => 'user',
            ]);

            Profile::create([
                'user_id' => $user->id,
                'jenis_kelamin' => 'laki-laki',
                'kota_domisili' => 'Jakarta',
                'deskripsi_diri' => 'Saya dummy laki ke-'.$i,
                'status' => 'approved',
            ]);
        }

        // DUMMY PEREMPUAN
        for ($i = 1; $i <= 3; $i++) {

            $user = User::create([
                'name' => 'Dummy Perempuan '.$i,
                'email' => 'dummy_cewe'.$i.'@mail.com',
                'password' => Hash::make('password'),
                'role' => 'user',
            ]);

            Profile::create([
                'user_id' => $user->id,
                'jenis_kelamin' => 'perempuan',
                'kota_domisili' => 'Bandung',
                'deskripsi_diri' => 'Saya dummy perempuan ke-'.$i,
                'status' => 'approved',
            ]);
        }
    }
}