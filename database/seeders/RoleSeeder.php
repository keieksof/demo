<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->syncPermissions(['create categories', 'show categories', 'edit categories', 'destroy categories', 'create posts', 'show posts', 'edit posts', 'destroy posts', 'create tags', 'show tags', 'edit tags', 'destroy tags', 'create users', 'show users', 'edit users', 'destroy users', 'create roles', 'show roles', 'edit roles', 'destroy roles',]);

        User::first()->assignRole('admin');
    }
}
