@extends('layouts.app')

@section('title', __('user.show.title'))

@section('content')

    @include('partials.errors')

    <div class="panel bg-white p-4 shadow-sm">
        <h3>{{ __('user.show.title_with_name', ['User' => $user->name]) }}</h3>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="name">{{ __('user.labels.name') }}</label>
                        <input id="name" name="name" type="text" class="form-control" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('user.labels.email') }}</label>
                        <input id="email" name="email" type="email" class="form-control"
                               value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">{{ __('user.labels.phone_number') }}</label>
                        <input id="phone_number" name="phone_number" class="form-control"
                               value="{{ $user->phone_number }}">
                    </div>
                    <div class="form-group">
                        <label>{{ __('user.labels.support_calculation') }}</label>
                        <input class="form-control" value="{{ $user->support_calculation }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="role">{{ __('user.labels.role') }}</label>
                        <select id="role" name="role_id" class="form-control">
                            @foreach ($roles as $role)
                                <option
                                    value="{{ $role->id }}" {{ $user->role_id === $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Opslaan</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 ml-auto">
                <div class="card p-3">
                    <h6 class="font-weight-bold">{{ __('user.labels.created_at') }}</h6>
                    <span class="font-italic">
                        {{ $user->formatted_created_at }}
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
