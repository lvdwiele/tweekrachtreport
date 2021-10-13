@extends('layouts.app')

@section('title', __('company.create.title'))

@section('content')

    @include('partials.errors')

    <div class="panel bg-white p-4 shadow-sm">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('companies.store') }}" method="POST">
                    @csrf
                    <h3>Een nieuw bedrijf toevoegen</h3>
                    <hr>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="name">Bedrijfsnaam: *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                   class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="email">E-mail: *</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                   class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="address">Adres:</label>
                            <input type="text" id="address" name="address" value="{{ old('address') }}"
                                   class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="zip_code">Postcode:</label>
                            <input type="text" id="zip_code" name="zip_code" value="{{ old('zip_code') }}"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="place">Plaats:</label>
                            <input type="text" id="place" name="place" value="{{ old('place') }}"
                                   class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="phone_number">Telefoon:</label>
                            <input type="text" id="phone_number" name="phone_number"
                                   value="{{ old('phone_number') }}"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">{{ __('company.create.submit_button') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
