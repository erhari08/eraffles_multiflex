<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User; // Make sure this points to your User model

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // // Define gates based on roles
        // Gate::define('is-admin', function (User $user) {
        //     return $user->role_id === 1; // or $user->role_id === 1;
        // });

        // Gate::define('is-user', function (User $user) {
        //     return $user->role_id === 2;
        // });

        // Gate::define('can-access-users', function (User $user) {
        //     return in_array($user->role_id, [1,2]);
        // });

        //  Gate::define('can-access-users_fresh_registration', function (User $user) {
        //     return $user->role_id === 2??$user->registratonStatus==null;
        // });
    }
}
