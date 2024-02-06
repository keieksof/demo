<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UsersPermissionSeeder extends Seeder
{
    public function run(): void
    {
        //User CRUD Permission

        $createUsersPermission = Permission::create(['name' => 'create users']);
        $editUsersPermission = Permission::create(['name' => 'edit users']);
        $showUsersPermission = Permission::create(['name' => 'show users']);
        $deleteUsersPermission = Permission::create(['name' => 'destroy users']);
    }
}
