<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

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

        //AUTHORS AND ADMINS

        Gate::define('manage-article', function ($user) {
            return ($user->role_id <= 2);
        });

        //ONLY ADMINS

        Gate::define('manage-users', function ($user) {
            return ($user->role_id == 1);
        });



        Passport::routes();

    }
}
