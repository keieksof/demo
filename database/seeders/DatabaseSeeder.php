<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user1 = User::factory(1)->create([
            'name' => 'Krenar',
            'email' => 'krenar@demo.com',
            'password' => Hash::make(123456789),
        ]);


        $this->call([
            CategoriesPermissionSeeder::class,
            PostsPermissionSeeder::class,
            RolesPermissionSeeder::class,
            TagsPermissionSeeder::class,
            UsersPermissionSeeder::class,
            RoleSeeder::class,
        ]);


        $user2 = User::factory(1)->create([
            'name' => 'Alex',
            'email' => 'alex@example.com',
            'password' => Hash::make(123456789),
        ]);


        User::factory(10)->create();

        Category::factory(10)->create();

        Tag::factory(100)->create();

        Post::factory(30)->create();


    }
}
