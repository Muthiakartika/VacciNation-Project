<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        Gate::define('spadmin', function (User $user)
        {
            return $user->role == 'SuperAdmin';
        });

        Gate::define('hcadmin', function (User $user)
        {
            return $user->role == 'HealthcareAdmin';
        });

        Gate::define('patient', function (User $user)
        {
            return $user->role == 'Patient';
        });
    }
}
