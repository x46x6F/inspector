<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Piece;
use App\Models\User;
use App\Policies\ModelPolicy;
use App\Policies\PiecePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Piece::class => PiecePolicy::class,
        Model::class => ModelPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('open-dash', function () {
            return Auth::user()->canViewDashboard;
        });
        // Gate::define('manageUser', function() {
        //     return Auth::user()->isSuperAdmin;
        // });
    }
}
