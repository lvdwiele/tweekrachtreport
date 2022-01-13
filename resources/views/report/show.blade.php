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
                <livewire:report-status-widget :report="$report"/>
            </div>
        </div>
    </div>
@endsection
