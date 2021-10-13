@extends('layouts.app')

@section('title', __('company.edit.title'))

@section('content')

    @include('partials.errors')

    <div class="panel bg-white p-4 shadow-sm">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('companies.update', [$company]) }}" method="POST">
                    @method('patch')
                    @csrf
                    <h3>{{ __('company.edit.title_with_name', ['Company' => $company->name]) }}</h3>
                    <hr>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="name">{{ __('company.labels.name') }}</label>
                            <input type="text" id="name" name="name" value="{{ $company->name }}"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="email">{{ __('company.labels.email') }}</label>
                            <input type="email" id="email" name="email" value="{{ $company->email }}"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="address">{{ __('company.labels.address') }}</label>
                            <input type="text" id="address" name="address" value="{{ $company->address }}"
                                   class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="zip_code">{{ __('company.labels.zip_code') }}</label>
                            <input type="text" id="zip_code" name="zip_code" value="{{ $company->zip_code }}"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="place">{{ __('company.labels.place') }}</label>
                            <input type="text" id="place" name="place" value="{{ $company->place }}"
                                   class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="phone_number">{{ __('company.labels.phone_number') }}</label>
                            <input type="text" id="phone_number" name="phone_number"
                                   value="{{ $company->phone_number }}"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">{{ __('company.edit.submit_button') }}</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 ml-auto">
                <div class="card p-3">
                    <h6 class="font-weight-bold">{{ __('company.labels.created_at') }}</h6>
                    <span class="font-italic">
                    {{ $company->formatted_created_at }}
                </span>
                    <hr>
                    <form action="{{ route('companies.destroy', [$company]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <a class="client-delete-btn btn btn-danger text-white btn-block">
                            {{ __('company.edit.delete_button') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
