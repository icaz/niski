<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', function($user){
            return $user->hasAnyRoles(['admin', 'superadmin']);
        });
        Gate::define('edit-users', function($user){
            return $user->hasRole('admin');
        });
        Gate::define('delete-users', function($user){
            return $user->hasRole('admin');
        });
        Gate::define('manage-posts', function($user){
            return $user->hasRole('admin');
        });
        Gate::define('manage-categories', function($user){
            return $user->hasRole('admin');
        });

/*
        ******** Gates regarding posts **********
*/
        Gate::define('manage-posts', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

        Gate::define('manage-roles', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });


        Gate::define('write-post', function($user){
            return $user->hasRole('blogger');
        });
        Gate::define('edit-post', function($user){
            return $user->hasRole('moderator');
        });
        Gate::define('delete-post', function($user){
            return $user->hasRole('moderator');
        });
        Gate::define('create-category', function($user){
            return $user->hasRole('moderator');
        });
        Gate::define('delete-category', function($user){
            return $user->hasRole('moderator');
        });    
    }
}
