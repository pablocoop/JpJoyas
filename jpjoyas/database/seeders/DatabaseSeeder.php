<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'username' => 'user', // solo si agregaste ese campo antes
            'email' => 'test@example.com',
            'password' => bcrypt('pass'), // cámbialo luego por seguridad
        ]);

        $this->call([
            AdminUserSeeder::class,
            InfoContentSeeder::class,
        ]);
    }
}
