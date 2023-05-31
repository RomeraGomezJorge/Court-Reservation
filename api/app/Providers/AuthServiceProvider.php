<?php

namespace App\Providers;

use App\Club;
use App\Court;
use App\Policies\ClubPolicy;
use App\Policies\CourtPolicy;
use App\Policies\ReservePolicy;
use App\Reserve;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Club::class    => ClubPolicy::class,
        Court::class   => CourtPolicy::class,
        Reserve::class => ReservePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
