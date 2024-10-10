<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'avatar' => 'general/static/profile.png',
            'first_name' => 'Demo',
            'last_name' => 'User',
            'email' => 'demo@coevs.com',
            'password' => \Hash::make(12345678),
        ]);
    }
}
