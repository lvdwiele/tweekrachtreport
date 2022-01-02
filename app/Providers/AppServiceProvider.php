<?php

namespace App\Providers;

use App\Models\Report;
use App\Models\User;
use App\Observers\ReportObserver;
use App\Observers\UserObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Report::observe(ReportObserver::class);

        Paginator::defaultView('partials.pagination.bootstrap');
        Paginator::defaultSimpleView('partials.pagination.simple-bootstrap');
    }
}
