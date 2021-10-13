<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

final class InformationController extends Controller
{
    /**
     * @return View
     */
    public function show(): View
    {
        return $this->view->make('information.show');
    }
}
