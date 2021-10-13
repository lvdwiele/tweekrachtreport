@extends('layouts.app')

@section('title', 'Nieuwe client')

@section('content')

    @include('partials.errors')

    <div class="panel bg-white p-4 shadow-sm">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('clients.store') }}" method="POST">
                    @csrf
                    <h3>Een nieuwe client toevoegen</h3>
                    <hr>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="first_name">Voornaam: *</label>
                            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                                   class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="last_name">Achternaam: *</label>
                            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                                   class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="email">E-mail: *</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                   class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone_number">Telefoon:</label>
                            <input type="text" id="phone_number" name="phone_number"
                                   value="{{ old('phone_number') }}"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="address">Adress:</label>
                            <input type="text" id="address" name="address" value="{{ old('address') }}"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="place">Woonplaats:</label>
                            <input type="text" id="place" name="place" value="{{ old('place') }}"
                                   class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="zip_code">Postcode:</label>
                            <input type="text" id="zip_code" name="zip_code" value="{{ old('zip_code') }}"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="company">Bedrijf:</label>
                        <select type="text" id="company" name="company_id" class="form-control selectpicker"
                                data-live-search="true">
                            <option value="">- Geen bedrijf geselecteerd -</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="core_power_1">Kernkracht 1: *</label>
                        <select id="core_power_1" name="core_power_1" class="form-control selectpicker"
                                data-live-search="true" required>
                            <option value="">- Selecteer eerste kernkracht -</option>
                            @foreach($corePowers as $corePower)
                                <option value="{{ $corePower->id }}">
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
                                <option value="{{ $corePower->id }}">
                                    {{ $corePower->display_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Client toevoegen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function () {
                $('.selectpicker').selectpicker();

                $('input:file').change(
                    function () {
                        if ($(this).val()) {
                            $('input:submit').attr('disabled', false);
                        }
                    }
                );
            });
        </script>
    @endpush

@endsection
