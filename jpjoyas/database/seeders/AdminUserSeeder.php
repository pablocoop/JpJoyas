<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'JP Joyas',
            'username' => 'admin', // solo si agregaste ese campo antes
            'email' => 'juanpabloosorio@gmail.com',
            'password' => Hash::make('admin123'), // cámbialo luego por seguridad
        ]);
    }
}
