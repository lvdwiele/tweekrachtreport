<?php

declare(strict_types=1);

namespace App\Observers;

use App\Events\ReportCreated;
use App\Models\Report;

class ReportObserver
{
    public function created(Report $report): void
    {
        event(new ReportCreated($report));
    }
}
