@extends('layouts.app')

@section('title', __('client.edit.title'))

@section('content')

    @include('partials.errors')

    <div class="panel bg-white p-4 shadow-sm">
        <h3>{{ __('client.edit.title_with_name', ['Client' => $client->full_name]) }}</h3>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('clients.update', $client) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="first_name">Voornaam: *</label>
                            <input type="text" id="first_name" name="first_name" value="{{ $client->first_name }}"
                                   class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="last_name">Achternaam: *</label>
                            <input type="text" id="last_name" name="last_name" value="{{ $client->last_name }}"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="email">E-mail: *</label>
                            <input type="email" id="email" name="email" value="{{ $client->email }}"
                                   class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="phone_number">Telefoon:</label>
                            <input type="text" id="phone_number" name="phone_number"
                                   value="{{ $client->phone_number }}"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="address">Adress:</label>
                            <input type="text" id="address" name="address" value="{{ $client->address }}"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="place">Woonplaats:</label>
                            <input type="text" id="place" name="place" value="{{ $client->place }}"
                                   class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="zip_code">Postcode:</label>
                            <input type="text" id="zip_code" name="zip_code" value="{{ $client->zip_code }}"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="company">Bedrijf:</label>
                        <select type="text" id="company" name="company_id" class="form-control selectpicker"
                                data-live-search="true">
                            <option value="">-- Selecteer een bedrijf --</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}"
                                @isset($client->company){{ $company->id === $client->company->id ? 'selected' : '' }}@endisset>
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    @if(isset($client->report))
                        <div class="form-group">
                            <label for="core_power_2">Kernkracht 2: *</label>
                            <input type="text" id="core_power_2" class="form-control"
                                   @isset($client->report) disabled @endif
                                   value="{{ $secondCorePower->display_name }}">
                        </div>
                        <div class="form-group">
                            <label for="core_power_1">Kernkracht 1: *</label>
                            <input type="text" id="core_power_1" class="form-control" disabled
                                   value="{{ $firstCorePower->display_name }}">
                        </div>
                    @else
                        <div class="form-group">
                            <label for="core_power_1">Kernkracht 1: *</label>
                            <select id="core_power_1" name="core_power_1" class="form-control selectpicker"
                                    data-live-search="true" required>
                                <option value="">- Selecteer eerste kernkracht -</option>
                                @foreach($corePowers as $corePower)
                                    <option
                                        @if(isset($firstCorePower) && $corePower->id === $firstCorePower->id) selected
                                        @endif value="{{ $corePower->id }}">
                                        {{ $corePower->display_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="core_power_2">Kernkracht 2: *</label>
                            <select id="core_power_2" name="core_power_2" class="form-control selectpicker"
                                    data-live-search="true" required>
                                <option value="">- Selecteer tweede kernkracht -</option>
                                @foreach($corePowers as $corePower)
                                    <option
                                        @if(isset($secondCorePower) && $corePower->id === $secondCorePower->id) selected
                                        @endif value="{{ $corePower->id }}">
                                        {{ $corePower->display_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Opslaan</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 ml-auto">
                <div class="card p-3">
                    <h6 class="font-weight-bold">{{ __('client.labels.created_at') }}</h6>
                    <span class="font-italic">
                    {{ $client->formatted_created_at }}
                </span>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('clients.destroy', $client) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a class="btn btn-danger text-white btn-block btn__client-delete">
                                    {{ __('client.edit.delete_button') }}
                                </a>
                            </form>
                        </div>
                        <div class="col-md-6">
                            @if(isset($client->report))
                                <a class="btn btn-success btn-block"
                                   href="{{ route('reports.show', ['report' => $client->report]) }}">
                                    {{ __('client.edit.show_report_button') }}
                                </a>
                            @else
                                <a class="btn btn-warning btn-block btn__create-report"
                                   data-href="{{ route('reports.create', $client) }}">
                                    {{ __('client.edit.create_report_button') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
