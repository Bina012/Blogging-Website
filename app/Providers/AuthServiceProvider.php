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
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if (! $this->app->routesAreCached()) {
            Passport::routes();
        }
        Passport::tokensExpireIn(now()->addDays(1));

        Gate::define('see_dashboard',function($user){
            return $user;
        });

        // Gate::define('manage_all',function($user){
        //     return $user->hasRole('superadmin');
        // });
        // Gate::define('see_dashboard',function($user){
        //     return $user->hasAnyRoles(['superadmin','admin']);
        // });
        // Gate::define('customer',function($user){
        //     return $user->hasRole('user');
        // });
    }
}
