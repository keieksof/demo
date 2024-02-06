<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class TagsPermissionSeeder extends Seeder
{
    public function run(): void
    {
        //Tags CRUD Permission

        $createTagsPermission = Permission::create(['name' => 'create tags']);
        $ViewTagsPermission = Permission::create(['name' => 'show tags']);
        $editTagsPermission = Permission::create(['name' => 'edit tags']);
        $deleteTagsPermission = Permission::create(['name' => 'destroy tags']);
    }
}
