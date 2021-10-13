<?php

namespace App\Events;

use App\Models\Report;
use Illuminate\Queue\SerializesModels;

final class ReportCreated
{
    use SerializesModels;

    public function __construct(public Report $report)
    {
    }
}
