<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RolesPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $createRolesPermission = Permission::create(['name' => 'create roles']);
        $ViewRolesPermission = Permission::create(['name' => 'show roles']);
        $editRolesPermission = Permission::create(['name' => 'edit roles']);
        $deleteRolesPermission = Permission::create(['name' => 'destroy roles']);
    }
}
