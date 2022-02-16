@extends('layouts.auth')

@section('title', 'Inloggen')

@section('content')
    <div class="row justify-content-center vertical-center">
        <div class="col-md-3">
            <div class="card border-0 bg-trans-75 border-125">
                <div class="card-header border-0 bg-transparent">
                    <div class="d-flex justify-content-center mt-3">
                        <img class="logo" src="{{ asset('/images/regilogo.png') }}" alt="logo">
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}"
                                       placeholder="{{ __('Gebruikersnaam / E-mailadres') }}" required
                                       autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       placeholder="{{ __('Wachtwoord') }}" required
                                       autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end align-items-center">
                                    @if (Route::has('password.request'))
                                        <div class="pr-3">
                                            <a class="text-dark float-right"
                                               href="{{ route('password.request') }}">
                                                {{ __('Wachtwoord vergeten?') }}
                                            </a>
                                        </div>
                                    @endif
                                    <button type="submit" class="btn btn-primary font-weight-bold">
                                        {{ __('Login') }} <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
