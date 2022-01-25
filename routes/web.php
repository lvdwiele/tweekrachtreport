<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserVerifyController;

Auth::routes([
    'register' => false
]);

/*
 * Users verification
 */
Route::get('/users/verify/{id}/{hash}', [UserVerifyController::class, 'show'])
    ->name('users.verify');
Route::post('/users/verify/{id}/{hash}', [UserVerifyController::class, 'store'])
    ->name('users.verify.store');

Route::group(['middleware' => ['verified', 'auth']], function () {
    /*
     * Dashboard
     */
    Route::get('/', [DashboardController::class, 'index'])
        ->name('home');

    /*
     * Profile
     */
    Route::get('/profile', [ProfileController::class, 'show'])
        ->name('profile');
    Route::patch('/profile/update', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::get('/information', [InformationController::class, 'show'])
        ->name('information');

    /*
     * Clients
     */
    Route::get('/clients', [ClientController::class, 'index'])
        ->name('clients');
    Route::get('/clients/create', [ClientController::class, 'create'])
        ->name('clients.create');
    Route::post('/clients', [ClientController::class, 'store'])
        ->name('clients.store');

    Route::group(['middleware' => ['can:view,client']], function () {
        Route::get('/clients/{client}', [ClientController::class, 'show'])
            ->name('clients.show');
        Route::patch('/clients/{client}', [ClientController::class, 'update'])
            ->name('clients.update');
        Route::delete('/clients/{client}', [ClientController::class, 'destroy'])
            ->name('clients.destroy');

        /*
         * Client Report
         */
        Route::group(['middleware' => ['can:view,client']], function () {
            Route::get('/clients/{client}/reports/create', [ReportController::class, 'create'])
                ->name('reports.create');
            Route::post('/clients/{client}/reports', [ReportController::class, 'store'])
                ->name('reports.store');
        });
    });

    /*
     * Companies
     */
    Route::get('/companies', [CompanyController::class, 'index'])
        ->name('companies');
    Route::get('/companies/create', [CompanyController::class, 'create'])
        ->name('companies.create');
    Route::post('/companies', [CompanyController::class, 'store'])
        ->name('companies.store');

    Route::group(['middleware' => 'can:view,company'], function () {
        Route::get('/companies/{company}', [CompanyController::class, 'show'])
            ->name('companies.show');
        Route::patch('/companies/{company}', [CompanyController::class, 'update'])
            ->name('companies.update');
        Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])
            ->name('companies.destroy');
    });

    /*
     * Reports
     */
    Route::get('/reports', [ReportController::class, 'index'])
        ->name('reports');

    Route::group(['middleware' => ['can:view,report']], function () {
        Route::get('/reports/{report}', [ReportController::class, 'show'])
            ->name('reports.show');
        Route::delete('/reports/{report}', [ReportController::class, 'destroy'])
            ->name('reports.destroy');
        Route::get('/reports/{report}/download', [ReportController::class, 'download'])
            ->name('reports.download');
    });

    /*
     * Users
     */
    Route::group(['middleware' => 'adminAccess'], function () {
        Route::get('/users', [UserController::class, 'index'])
            ->name('users');
        Route::get('/users/create', [UserController::class, 'create'])
            ->name('users.create');
        Route::post('/users', [UserController::class, 'store'])
            ->name('users.store');

        Route::group(['middleware' => ['can:view,user']], function () {
            Route::get('/users/{user}', [UserController::class, 'show'])
                ->name('users.show');
            Route::patch('/users/{user}', [UserController::class, 'update'])
                ->name('users.update');
            Route::delete('/users/{user}', [UserController::class, 'destroy'])
                ->name('users.destroy');
        });
    });

    /*
     * Auth
     */
    Route::get('/logout', [LoginController::class, 'logout']);
});

