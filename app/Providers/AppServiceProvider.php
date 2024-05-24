<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('isAdmin', function (User $user) {
            return $user->role_id === 1;
        });
        Gate::define('isKaryawan', function (User $user) {
            return $user->role_id === 2;
        });
        Gate::define('isPemimpin', function (User $user) {
            return $user->role_id === 3;
        });
    }
}
