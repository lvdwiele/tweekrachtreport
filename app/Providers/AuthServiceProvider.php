<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\Company;
use App\Models\Report;
use App\Models\User;
use App\Policies\ClientPolicy;
use App\Policies\CompanyPolicy;
use App\Policies\ReportPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Client::class => ClientPolicy::class,
        Company::class => CompanyPolicy::class,
        User::class => UserPolicy::class,
        Report::class => ReportPolicy::class
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
