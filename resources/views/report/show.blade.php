@extends('layouts.app')

@section('title', __('report.show.title'))

@section('content')

    <div class="panel bg-white p-4 shadow-sm">
        <h3>{{ __('report.show.title_with_name', ['Client' => $report->client->full_name]) }}</h3>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <p class="lead">
                    {!! __('report.show.first_line', ['date' => $report->formatted_created_at]) !!}
                    <br>
                    {!! __('report.show.second_line', ['user' => $report->client->user->name]) !!}
                    <br>
                    {!! __('report.show.third_line', ['first_core_power' => $firstCorePower->power, 'second_core_power' => $secondCorePower->power]) !!}
                    <br>
                    {!! __('report.show.fourth_line', ['first_support_power' => $firstSupportPower->power, 'second_support_power' => $secondSupportPower->power]) !!}
                </p>
            </div>
            <div class="col-md-4 ml-auto">
                <div class="card p-3">
                    <h6 class="font-weight-bold">{{ __('report.labels.created_at') }}</h6>
                    <span class="font-italic">
                        {{ $report->formatted_created_at }}
                    </span>
                    <h6 class="font-weight-bold mt-2">{{ __('report.labels.client') }}</h6>
                    <span class="font-italic">
                        {{ $report->client->full_name }}
                    </span>
                    <h6 class="font-weight-bold mt-2">{{ __('report.labels.file_status') }}</h6>
                    <span class="font-italic font-weight-bold {{ $report->file_status_class }}">
                        {{ $report->file_status_text }}
                    </span>
                    <hr>
                    <div class="row">
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
                        @elseif($report->file_status === \App\Models\Report::$FILE_STATUS_NOT_FOUND)
                            <div class="col-md-6">
                                <form action="{{ route('reports.create_file', [$report]) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" class="btn btn-info text-white btn-block">
                                        {{ __('report.show.make_file_button') }}
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="col-md-6">
                                <button class="btn btn-info btn-block" disabled>
                                    {{ __('report.show.export_button') }}
                                </button>
                            </div>
                        @endif
                        <div class="col-md-6">
                            <form action="{{ route('reports.destroy', [$report]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a class="report-delete-btn btn btn-danger text-white btn-block">
                                    {{ __('report.show.delete_button') }}
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
