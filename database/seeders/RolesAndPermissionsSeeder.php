<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'manage prospects']);
        Permission::create(['name' => 'manage users']);

        // Create roles and assign created permissions
        $role = Role::create(['name' => 'commercial']);
        $role->givePermissionTo('manage prospects');

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(['manage prospects', 'manage users']);
    }
}
