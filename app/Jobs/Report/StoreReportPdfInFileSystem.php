<?php

namespace App\Jobs\Report;

use App\Models\Report;
use App\Tweekracht\Dto\ReportPdfDto;
use App\Tweekracht\Helpers\PowerColorHelper;
use App\Tweekracht\Helpers\PowerHelper;
use Barryvdh\DomPDF\PDF;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreReportPdfInFileSystem implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private Report $report)
    {
    }

    public function handle(PDF $domPdf, FilesystemManager $fileSystem): void
    {
        $client = $this->report->client;

        $reportPdf = new ReportPdfDto(
            resolve(PowerHelper::class),
            resolve(PowerColorHelper::class),
            $client,
            $client->corePowers->first(),
            $client->corePowers->last(),
            $client->supportPowers->first(),
            $client->supportPowers->last()
        );

        $pdf = $domPdf->loadView('report.pdf', [
            'client' => $client,
            'reportPdf' => $reportPdf,
        ]);

        $fileSystem->disk('reports')
            ->put($client->report_file_name, $pdf->output());

        $this->report->update([
            'file_status' => Report::$FILE_STATUS_AVAILABLE,
        ]);
    }

    public function failed()
    {
        $this->report->update([
            'file_status' => Report::$FILE_STATUS_ERROR,
        ]);
    }
}
