<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class CategoriesPermissionSeeder extends Seeder
{
    public function run(): void
    {
        //Categories CRUD Permission

        $createCategoriesPermission = Permission::create(['name' => 'create categories']);
        $ViewCategoriesPermission = Permission::create(['name' => 'show categories']);
        $editCategoriesPermission = Permission::create(['name' => 'edit categories']);
        $deleteCategoriesPermission = Permission::create(['name' => 'destroy categories']);
    }
}
