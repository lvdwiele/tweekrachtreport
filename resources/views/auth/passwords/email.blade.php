@extends('layouts.auth')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card bg-transparent border-0">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}"
                                       placeholder="{{ __('E-mailadres') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block font-weight-bold">
                                    {{ __('Stuur link voor wachtwoord wijzigen') }}
                                </button>

                                <a class="p-3 text-dark float-right"
                                   href="{{ route('login') }}">
                                    {{ __('Terug naar login') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
