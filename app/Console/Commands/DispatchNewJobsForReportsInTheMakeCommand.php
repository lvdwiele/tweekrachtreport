<?php

namespace App\Console\Commands;

use App\Jobs\Report\StoreReportPdfInFileSystem;
use App\Models\Report;
use Illuminate\Console\Command;

class DispatchNewJobsForReportsInTheMakeCommand extends Command
{
    protected $signature = 'dispatch-new-jobs:reports-in-the-make';

    protected $description = '';

    public function handle()
    {
        Report::where('status', Report::$FILE_STATUS_IN_THE_MAKE)
            ->get()
            ->each(function (Report $report) {
                StoreReportPdfInFileSystem::dispatch($report);
            });
    }
}
