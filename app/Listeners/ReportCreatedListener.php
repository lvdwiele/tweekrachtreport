<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\ReportCreated;
use App\Jobs\Report\StoreReportPdfInFileSystem;

final class ReportCreatedListener
{
    public function handle(ReportCreated $event): void
    {
        StoreReportPdfInFileSystem::dispatch($event->report);
    }
}
