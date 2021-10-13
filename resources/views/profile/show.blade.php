@extends('layouts.app')

@section('title', __('profile.title'))

@section('content')
    <div class="panel bg-white p-4 shadow-sm">
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{ route('profile.update', [$user->id]) }}">
                    @csrf
                    @method('patch')

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="name">{{ __('profile.labels.name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name"
                                   value="{{ $user->name }}" placeholder="{{ __('profile.labels.name') }}" required>

                            @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="email">{{ __('profile.labels.email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email"
                                   value="{{ $user->email }}" placeholder="{{ __('profile.labels.email') }}" required>

                            @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="phone_number">{{ __('profile.labels.phone_number') }}</label>
                            <input id="phone_number" type="text"
                                   class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                   value="{{ old('phone_number') }}"
                                   placeholder="{{ __('profile.labels.phone_number') }}">
                        </div>
                    </div>

                    <h6><strong>{{ __('profile.labels.password_section') }}</strong></h6>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="password">{{ __('profile.labels.password') }}</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password"
                                   placeholder="{{ __('profile.labels.password') }}">

                            @error('password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="password_confirmation">{{ __('profile.labels.password_confirmation') }}</label>
                            <input id="password_confirmation" type="password"
                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                   name="password_confirmation"
                                   placeholder="{{ __('profile.labels.password_confirmation') }}">

                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary font-weight-bold">
                                {{ __('profile.submit_button') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
