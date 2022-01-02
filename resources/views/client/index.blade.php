@extends('layouts.app')

@section('title', 'Clienten')

@section('content')
    <div class="panel bg-white p-4 shadow-sm">
        <div class="row">
            <form class="col-auto form-inline form-group mr-auto" method="GET">
                <div class="ml-auto mr-3">
                    <input type="text" class="form-control" id="filter" name="filter" placeholder="Zoeken..."
                           value="{{ $filter }}">
                </div>
                <button type="submit" class="btn btn-info">Zoeken</button>
            </form>
            <div class="col-auto mb-2">
                <a href="{{ route('clients.create')}}"
                   class="btn btn-block btn-primary">{!! __('client.index.add_client') !!}</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table id="table" class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ __('client.index.table_headers.name') }}</th>
                        <th>{{ __('client.index.table_headers.first_core_power') }}</th>
                        <th>{{ __('client.index.table_headers.second_core_power') }}</th>
                        <th>{{ __('client.index.table_headers.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($clients as $client)
                        <tr class="clickable-row" data-href="{{ route('clients.show', [$client->id]) }}">
                            <td>{{ $client->full_name }}</td>

                            @foreach($client->corePowers as $power)
                                <td>
                                    <h6 style="color: {{ $power->color }}" class="font-weight-bold">
                                        {{ $power->power }}
                                    </h6>
                                </td>
                            @endforeach

                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('clients.show', [$client->id]) }}">
                                    <i class="far fa-eye"></i>
                                </a>

                                <form style="display: inline-block"
                                      action="{{ route('clients.destroy', [$client->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a class="btn__client-delete btn btn-sm btn-danger text-white">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </form>

                                @if (isset($client->report))
                                    <a href="{{ route('reports.show', [$client->report->id]) }}"
                                       class="delete-modal btn btn-sm btn-success">
                                        <i class="far fa-eye"></i> {{ __('client.index.report_button.report') }}
                                    </a>
                                @else
                                    <a class="btn__create-report btn btn-sm btn-warning text-white"
                                       data-href="{{ route('reports.create', [$client->id]) }}">
                                        <i class="fas fa-plus"></i> {{ __('client.index.report_button.report') }}
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $clients->onEachSide(2)->links() }}
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
