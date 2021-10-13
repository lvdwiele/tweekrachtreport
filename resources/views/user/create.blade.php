@extends('layouts.app')

@section('title', __('user.create.title'))

@section('content')
    <div class="panel bg-white p-4 shadow-sm">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <h3>{{ __('user.create.panel_title') }}</h3>
                    <hr>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="name">{{ __('user.labels.name') }}</label>
                            <input type="text"
                                   id="name"
                                   name="name"
                                   value="{{ old('name') }}"
                                   class="form-control @error('name') is-invalid @enderror"
                                   required
                            >
                            @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="email">{{ __('user.labels.email') }}</label>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   class="form-control @error('email') is-invalid @enderror"
                                   required
                            >
                            @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role">{{ __('user.labels.role') }}</label>
                        <select id="role" name="role_id" class="form-control @error('role_id') is-invalid @enderror" required>
                            <option value="" selected>{{__('user.create.make_a_choice')  }}</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role_id')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">{{ __('user.create.submit_button') }}</button>
                        <span
                            class="d-block mt-2 small font-italic">{{ __('user.create.message_after_creating') }}</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
