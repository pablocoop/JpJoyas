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
            'email' => 'admin@admin.cl',
            'password' => Hash::make('admin123'), // cámbialo luego por seguridad
            'is_admin' => true,
        ]);
    }
}
