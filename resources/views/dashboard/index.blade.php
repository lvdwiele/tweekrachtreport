@extends('layouts.app')

@section('title', 'Overzicht')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="panel bg-white p-4 shadow-sm">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="font-weight-bold">Uw meest recent toegevoegd clienten</h6>
                        <table id="table" class="table table-hover">
                            <thead>
                            <tr>
                                <th>Naam</th>
                                <th>Kernkracht 1</th>
                                <th>Kernkracht 2</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($clients as $client)
                                <tr class='clickable-row' data-href='{{ route('clients.show', [$client->id]) }}'>
                                    <td> {{ $client ->first_name}} {{ $client->last_name}}</td>
                                    @foreach($client->corePowers as $corePower)
                                        <td>{{ $corePower->power }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('clients.create')}}" class="btn btn-block btn-primary">
                            Voeg nieuwe client toe
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel bg-white p-4 shadow-sm">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="font-weight-bold">Uw meest recent toegevoegde bedrijven.</h6>
                        <table id="table" class="table table-hover">
                            <thead>
                            <tr>
                                <th>Naam</th>
                                <th>Plaats</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($companies as $company)
                                <tr class='clickable-row' data-href='{{ route('companies.show', [$company->id]) }}'>
                                    <td> {{ $company->name }}</td>
                                    <td> {{ $company->place }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('companies.create')}}" class="btn btn-block btn-primary">
                            Voeg nieuw bedrijf toe
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel bg-white p-4 shadow-sm">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="font-weight-bold">Meest recent gemaakt rapportages.</h6>

                        <table id="table" class="table table-hover">
                            <thead>
                            <tr>
                                <th>Client</th>
                                <th>Aangemaakt</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($reports as $report)
                                <tr class='clickable-row' data-href='{{ route('reports.show', [$report->id]) }}'>
                                    <td>{{ $report->client->full_name }}</td>
                                    <td>{{ date('j M Y', strtotime($report->created_at)) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('clients') }}" class="btn btn-block btn-primary">
                            Maak nieuw rapport aan
                        </a>
                    </div>
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
