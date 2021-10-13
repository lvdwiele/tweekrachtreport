<?php

declare(strict_types=1);

namespace App\Tweekracht\Actions\Reports;

use App\Models\Client;
use App\Models\Report;
use App\Models\SupportPower;
use App\Tweekracht\Dto\ReportDto;
use Illuminate\Database\Eloquent\Model;

final class ReportCreateAction
{
    public function __invoke(Client $client, ReportDto $reportDto): Model|Report
    {
        /** @var Report $report */
        $report = $client->report()->create([
            'user_id' => $client->user->id,
            'file_status' => Report::$FILE_STATUS_IN_THE_MAKE
        ]);

        $reportDto->support_powers->each(function (SupportPower $supportPower) use ($report) {
            $report->client->supportPowers()->attach($supportPower);
        });

        $report->save();

        return $report;
    }
}
