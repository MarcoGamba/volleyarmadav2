<?php

namespace Database\Seeders;

use App\Models\Edition;
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

        // seed edition
        $edition2025 = Edition::factory()
            ->create([
                'edition_number' => 2025,
                'created_at' => '2025-03-19 04:12:34',
                'updated_at' => '2025-07-28 14:45:08',
            ]);

        $edition2024 = Edition::factory()
            ->create([
                'edition_number' => 2024,
                'created_at' => '2024-02-11 11:09:12',
                'updated_at' => '2024-07-28 21:34:19',
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
