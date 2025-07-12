<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider; // ¡Nota: hereda de AuthServiceProvider!
use Illuminate\Support\Facades\Gate;
use App\Domains\Plans\Models\Plan;
use App\Policies\PlanPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     */
    protected $policies = [
        \App\Domains\Plans\Models\Plan::class => \App\Policies\PlanPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies(); // <--- ¡Esto es lo que hace falta!
    }
}
