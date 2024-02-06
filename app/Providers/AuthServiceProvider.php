<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

        //Categories

        Gate::define('categories-page', function (User $user) {
            return $user->hasAnyPermission(
                'create categories',
                'edit categories',
                'show categories',
                'destroy categories',
            );
        });

        Gate::define('create-categories', function (User $user) {
            return $user->hasPermissionTo('create categories');

        });
        Gate::define('edit-categories', function (User $user) {
            return $user->hasPermissionTo('edit categories');

        });
        Gate::define('destroy-categories', function (User $user) {
            return $user->hasPermissionTo('destroy categories');

        });
        Gate::define('show-categories', function (User $user) {
            return $user->hasPermissionTo('show categories');

        });

        //Posts

        Gate::define('update-posts-user', function (User $user, Post $post) {

            return $user->id === $post->user_id;

        });


        Gate::define('posts-page', function (User $user) {
            return $user->hasAnyPermission(
                'create posts',
                'edit posts',
                'show posts',
                'destroy posts',
            );
        });

        Gate::define('create-posts', function (User $user) {
            return $user->hasPermissionTo('create posts');

        });
        Gate::define('edit-posts', function (User $user) {
            return $user->hasPermissionTo('edit posts');

        });
        Gate::define('destroy-posts', function (User $user) {
            return $user->hasPermissionTo('destroy posts');

        });
        Gate::define('show-posts', function (User $user) {
            return $user->hasPermissionTo('show posts');

        });

        //Tags


        Gate::define('tags-page', function (User $user) {
            return $user->hasAnyPermission(
                'create tags',
                'edit tags',
                'show tags',
                'destroy tags',
            );
        });

        Gate::define('create-tags', function (User $user) {
            return $user->hasPermissionTo('create tags');

        });
        Gate::define('edit-tags', function (User $user) {
            return $user->hasPermissionTo('edit tags');

        });
        Gate::define('destroy-tags', function (User $user) {
            return $user->hasPermissionTo('destroy tags');

        });
        Gate::define('show-tags', function (User $user) {
            return $user->hasPermissionTo('show tags');

        });

        //Roles


        Gate::define('roles-page', function (User $user) {
            return $user->hasAnyPermission(
                'create roles',
                'edit roles',
                'show roles',
                'destroy roles',
            );
        });

        Gate::define('create-roles', function (User $user) {
            return $user->hasPermissionTo('create roles');

        });
        Gate::define('edit-roles', function (User $user) {
            return $user->hasPermissionTo('edit roles');

        });
        Gate::define('destroy-roles', function (User $user) {
            return $user->hasPermissionTo('destroy roles');

        });
        Gate::define('show-roles', function (User $user) {
            return $user->hasPermissionTo('show roles');

        });

        //Users


        Gate::define('users-page', function (User $user) {
            return $user->hasAnyPermission(
                'create users',
                'edit users',
                'show users',
                'destroy users',
            );
        });

        Gate::define('create-users', function (User $user) {
            return $user->hasPermissionTo('create users');

        });
        Gate::define('edit-users', function (User $user) {
            return $user->hasPermissionTo('edit users');

        });
        Gate::define('destroy-users', function (User $user) {
            return $user->hasPermissionTo('destroy users');

        });
        Gate::define('show-users', function (User $user) {
            return $user->hasPermissionTo('show users');

        });
    }
}
