<?php

declare(strict_types=1);

namespace App\Tweekracht\Actions\Reports;

use App\Models\Report;

final class ReportDeleteAction
{
    public function __invoke(Report $report): bool
    {
        return $report->delete();
    }
}
