<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Marco Gamba',
            'email' => 'marco.gamba@akomi.it',
            'email_verified_at' => fake()->randomElement([now(), null]),
        ]);
    }
}
