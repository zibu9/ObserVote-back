<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        Gate::define('admin-access', function ($user) {
            return $user->role->role === 'Admin';
        });

        Gate::define('superadmin-access', function ($user) {
            return $user->role->role === 'SuperAdmin';
        });

        Gate::define('observer-access', function ($user) {
            return $user->role->role === 'Observer';
        });
    }
}
