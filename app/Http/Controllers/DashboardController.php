<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

final class DashboardController extends Controller
{
    public function index(): View
    {
        /** @var User $user */
        $user = Auth::user();

        $clients = $user->clients()
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $companies = $user->companies()
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $reports = $user->reports()
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return $this->view->make('dashboard.index', compact('clients', 'companies', 'reports'));
    }
}
