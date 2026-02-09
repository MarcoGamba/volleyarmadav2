<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
        ]);

        $admins = User::factory(2)
            ->create()
            ->each(function ($user) {
                $user->assignRole('admin');
            });

        $simpleUsers = User::factory(5)
            ->create()
            ->each(function ($user) {
                $user->assignRole('simple-user');
            });

        User::factory()->create([
            'name' => 'Marco Gamba',
            'email' => 'marco.gamba@akomi.it',
            'email_verified_at' => fake()->randomElement([now(), null]),
        ])->assignRole('super-admin');
    }
}
