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
                    <p>
                        {{ __('Je moet eerst jouw email verifiëren. Controleer jouw mailbox (en de spambox). We hebben je een mail gestuurd.') }}
                    </p>
                    <p>
                        {{ __('Niks ontvangen? Klik op "opnieuw versturen".') }}
                    </p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex justify-content-end align-items-center">

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <button type="submit" class="btn">
                                        {{ __('Uitloggen') }}
                                        <i class="fas fa-sign-out-alt mr-3"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-end align-items-center">

                                <form method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary font-weight-bold">
                                        {{ __('Opnieuw versturen') }} <i
                                            class="fas fa-arrow-right"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
