@extends('layouts.app')

@section('title', __('report.index.title'))

@section('content')
    <div class="panel bg-white p-4 shadow-sm">
        <div class="row mb-2">
            <div class="col-auto mr-auto">
                <h3>{{ $reports->total() }} {{ strtolower(__('report.index.panel_title')) }}</h3>
            </div>
            <div class="col-auto">
                <form class="form-inline form-group" method="GET">
                    <div class="ml-auto mr-3">
                        <input type="text" class="form-control" id="filter" name="filter" placeholder="Zoeken..."
                               value="{{ $filter }}">
                    </div>
                    <button type="submit" class="btn btn-info">Zoeken</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-overzicht" id="tabel">
                    <table id="table" class="table table-hover">
                        <thead>
                        <tr>
                            <th>{{ __('report.index.table_headers.client') }}</th>
                            <th>{{ __('report.index.table_headers.first_core_power') }}</th>
                            <th>{{ __('report.index.table_headers.second_core_power') }}</th>
                            <th>{{ __('report.index.table_headers.first_support_power') }}</th>
                            <th>{{ __('report.index.table_headers.second_support_power') }}</th>
                            <th>{{ __('report.index.table_headers.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($reports as $report)
                            <tr class="clickable-row" data-href="{{ route('reports.show', ['report' => $report]) }}">
                                <td>{{ $report->client->full_name }}</td>

                                @foreach($report->client->corePowers as $power)
                                    <td>
                                        <h6 style="color: {{ $power->color }}" class="font-weight-bold">
                                            {{ $power->power }}
                                        </h6>
                                    </td>
                                @endforeach

                                @foreach($report->client->supportPowers as $power)
                                    <td>
                                        <h6 style="color: {{ $power->color }}" class="font-weight-bold">
                                            {{ $power->power }}
                                        </h6>
                                    </td>
                                @endforeach

                                <td>
                                    <a class="btn btn-sm btn-primary"
                                       href="{{ route('reports.show', [$report]) }}">
                                        <i class="far fa-eye"></i>
                                    </a>

                                    <form style="display: inline-block"
                                          action="{{ route('reports.destroy', [$report]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <a class="report-delete-btn btn btn-sm btn-danger text-white">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $reports->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $(".clickable-row").click(function () {
                window.location = $(this).data("href");
            });
        });
    </script>
@endpush
