@extends('layouts.auth')

@section('title', 'Account verifiëren')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card bg-transparent border-0">
                <div class="card-body">
                    <form method="POST" action="{{ route('users.verify.store', [$id, $hash]) }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       value="{{ old('password') }}"
                                       placeholder="{{ __('Wachtwoord') }}" required autofocus>

                                @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password_confirmation" type="password"
                                       class="form-control @error('password_confirmation') is-invalid @enderror"
                                       name="password_confirmation"
                                       placeholder="{{ __('Wachtwoord bevestigen') }}" required>

                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block font-weight-bold">
                                    {{ __('Activeren') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
