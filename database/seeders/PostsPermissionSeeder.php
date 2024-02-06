<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PostsPermissionSeeder extends Seeder
{
    public function run(): void
    {
        //Posts CRUD Permission

        $createPostsPermission = Permission::create(['name' => 'create posts']);
        $ViewPostsPermission = Permission::create(['name' => 'show posts']);
        $editPostsPermission = Permission::create(['name' => 'edit posts']);
        $deletePostsPermission = Permission::create(['name' => 'destroy posts']);
    }
}
