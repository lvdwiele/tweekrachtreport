<div class="card p-3">
    <h6 class="font-weight-bold">{{ __('report.labels.created_at') }}</h6>
    <span class="font-italic">
        {{ $report->formatted_created_at }}
    </span>
    <h6 class="font-weight-bold mt-2">{{ __('report.labels.client') }}</h6>
    <span class="font-italic">{{ $report->client->full_name }}</span>
    <h6 class="font-weight-bold mt-2">{{ __('report.labels.file_status') }}</h6>
    <span class="font-italic font-weight-bold {{ $report->file_status_class }}">
        @if($report->file_status === \App\Models\Report::$FILE_STATUS_IN_THE_MAKE)
            <i wire class="mr-1 fas fa-compact-disc fa-spin"></i>
        @endif
        @if($report->file_status === \App\Models\Report::$FILE_STATUS_ERROR)
            <i wire class="mr-1 fas fa-times"></i>
        @endif
        {{ $report->file_status_text }}
    </span>
    <hr>
    <div class="row" wire:poll.500ms>
        <div class="col-md-6 mb-3">
            <a class="btn btn-success btn-block"
               href="{{ route('clients.show', [$report->client]) }}">
                {{ __('report.show.client_button') }}
            </a>
        </div>
        @if ($report->file_status === \App\Models\Report::$FILE_STATUS_AVAILABLE)
            <div class="col-md-6">
                <a class="btn btn-info text-white btn-block"
                   href="{{ route('reports.download', ['report' => $report]) }}">
                    {{ __('report.show.export_button') }}
                </a>
            </div>
            <div class="col-md-6">
                <button wire:click="createFile()" type="submit"
                        class="btn btn-danger text-white btn-block">
                    {{ __('report.show.recreate_button') }}
                </button>
            </div>
        @elseif($report->file_status === \App\Models\Report::$FILE_STATUS_NOT_FOUND
				|| $report->file_status === \App\Models\Report::$FILE_STATUS_ERROR)
            <div class="col-md-6">
                <button wire:click="createFile()" type="submit"
                        class="btn btn-info text-white btn-block">
                    {{ __('report.show.make_file_button') }}
                </button>
            </div>
        @else
            <div class="col-md-6">
                <button class="btn btn-info btn-block" disabled>
                    {{ __('report.show.export_button') }}
                </button>
            </div>
        @endif
        <div class="col-md-6">
            <button wire:click="destroy()"
                    class="report-delete-btn btn btn-danger text-white btn-block">
                {{ __('report.show.delete_button') }}
            </button>
        </div>
    </div>
</div>
