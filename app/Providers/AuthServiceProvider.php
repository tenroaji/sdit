<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
// use App\Models\User;

use App\Policies\AbsensiPolicy;
use App\Policies\JenisNilaiPolicy;
use Illuminate\Foundation\Auth\User;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        JenisNilaiPolicy::class,
        AbsensiPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Gate::before(function (User $user, string $ability) {
        //     return $user->isSuperAdmin() ? true: null;
        // });
    }
}
