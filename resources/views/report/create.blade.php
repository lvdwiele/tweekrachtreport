@extends('layouts.app')

@section('title', __('report.create.title'))

@section('content')

    @include('partials.errors')

    <div class="panel bg-white p-4 shadow-sm">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('reports.store', [$client]) }}" method="POST">
                    @csrf
                    <h3>{{ __('report.create.title') }}</h3>
                    <hr>
                    <div class="row form-group">
                        <div class="col-md-6">
                            @if ($firstSupportPowers->count() > 1)
                                <label for="first_support_power">
                                    {{ __('report.labels.support_power_is_not_chosen') }}
                                </label>
                                <select type="text" id="first_support_power"
                                        name="first_support_power"
                                        class="form-control">
                                    <option>{{ __('report.create.please_make_a_choice') }}</option>
                                    @foreach($firstSupportPowers as $supportPower)
                                        <option
                                            value="{{ $supportPower->id }}" {{ old('first_support_power') == $supportPower->id ? 'selected' : '' }}>
                                            {{ $supportPower->display_name }}
                                        </option>
                                    @endforeach
                                </select>
                            @elseif($firstSupportPowers->count() === 1)
                                <label for="first_support_power">
                                    {{ __('report.labels.support_power_is_chosen') }}
                                </label>
                                <input type="text" id="first_support_power" class="form-control"
                                       value="{{ $firstSupportPowers->first()->display_name }}"
                                       disabled>
                                <input type="hidden" name="first_support_power"
                                       value="{{ $firstSupportPowers->first()->id }}">
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if ($secondSupportPowers->count() > 1)
                                <label for="second_support_power">
                                    {{ __('report.labels.support_power_is_not_chosen') }}
                                </label>
                                <select type="text" id="second_support_power"
                                        name="second_support_power"
                                        class="form-control">
                                    <option>{{ __('report.create.please_make_a_choice') }}</option>
                                    @foreach($secondSupportPowers as $supportPower)
                                        <option value="{{ $supportPower->id }}" {{ old('second_support_power') == $supportPower->id ? 'selected' : '' }}>
                                            {{ $supportPower->display_name }}
                                        </option>
                                    @endforeach
                                </select>
                            @elseif($secondSupportPowers->count() === 1)
                                <label for="second_support_power">
                                    {{ __('report.labels.support_power_is_chosen') }}
                                </label>
                                <input type="text" id="second_support_power" class="form-control"
                                       value="{{ $secondSupportPowers->first()->display_name }}"
                                       disabled>
                                <input type="hidden" name="second_support_power"
                                       value="{{ $secondSupportPowers->first()->id }}">
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit"
                                class="btn btn-success">{{ __('report.create.submit_button') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
