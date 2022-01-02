@extends('layouts.app')

@section('title', 'Bedrijven')

@section('content')
    <div class="panel bg-white p-4 shadow-sm">
        <div class="row mb-2">
            <form class="col-auto form-inline form-group mr-auto" method="GET">
                <div class="ml-auto mr-3">
                    <input type="text" class="form-control" id="filter" name="filter" placeholder="Zoeken..."
                           value="{{ $filter }}">
                </div>
                <button type="submit" class="btn btn-info">Zoeken</button>
            </form>
            <div class="col-auto">
                <a href="{{ route('companies.create')}}"
                   class="btn btn-block btn-primary">{!! __('company.index.add_company') !!}</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table id="table" class="table table-hover">
                    <thead>
                    <tr>
                        <th>Bedrijf</th>
                        <th>Adress</th>
                        <th>Postcode</th>
                        <th>Plaats</th>
                        <th>Telefoon</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($companies as $company)
                        <tr class='clickable-row'
                            data-href='{{ route('companies.show', ['company' => $company]) }}'>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->address }}</td>
                            <td>{{ $company->zip_code }}</td>
                            <td>{{ $company->place }}</td>
                            <td>{{ $company->phone_number }}</td>
                            <td>{{ $company->email }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $companies->onEachSide(2)->links() }}
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
