<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // users permissions
        Permission::create(['name' => 'index users']);
        Permission::create(['name' => 'show user']);

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // super-admin
        Role::create(['name' => 'super-admin'])
            ->givePermissionTo(Permission::all());

        // admin
        Role::create(['name' => 'admin'])
            ->givePermissionTo([
                'index users',
                'show user',
            ]);

        // simple-user
        Role::create(['name' => 'simple-user'])->givePermissionTo([]);
    }
}
