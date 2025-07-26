<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Test User',
            'username' => 'user', // solo si agregaste ese campo en tu migración
            'email' => 'test@example.com',
            'password' => Hash::make('pass'), // encripta bien
            'is_admin' => false, // si tienes esta columna
        ]);

        $this->call([
            AdminUserSeeder::class,
            InfoContentSeeder::class,
        ]);
    }
}
