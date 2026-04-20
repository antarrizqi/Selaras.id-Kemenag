<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;


    public function run()
    {
        // ADMIN
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'phone' => '0811111111',
                'password' => Hash::make('12345'),
                'role' => 'admin'
            ]
        );

        // MEDIATOR
        User::updateOrCreate(
            ['email' => 'mediator@gmail.com'],
            [
                'name' => 'Mediator',
                'phone' => '0822222222',
                'password' => Hash::make('12345'),
                'role' => 'mediator'
            ]
        );
    }
}
