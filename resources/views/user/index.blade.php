@extends('layouts.app')

@section('title', __('user.index.title'))

@section('content')
    <div class="panel bg-white p-4 shadow-sm">
        <div class="row mb-2">
            <div class="col-auto mr-auto">
                <h3>{{ $users->total() }} {{ strtolower(__('user.index.panel_title')) }}</h3>
            </div>
            <div class="col-auto">
                <a href="{{ route('users.create')}}"
                   class="btn btn-primary shadow-sm">{!! __('user.index.add_user') !!}</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table id="table" class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ __('user.index.table_headers.name') }}</th>
                        <th>{{ __('user.index.table_headers.email') }}</th>
                        <th>{{ __('user.index.table_headers.rate') }}</th>
                        <th>{{ __('user.index.table_headers.role') }}</th>
                        <th>{{ __('user.index.table_headers.reports_amount_this_month') }}</th>
                        <th>{{ __('user.index.table_headers.reports_amount_previous_month') }}</th>
                        <th>{{ __('user.index.table_headers.reports_amount_previous_previous_month') }}</th>
                        <th>{{ __('user.index.table_headers.reports_amount') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr class="clickable-row" data-href="{{ route('users.show', $user) }}">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->rate }} %</td>
                            <td>{{ $user->role->name }}</td>
                            <td>{{ $user->reports_this_month_count }}</td>
                            <td>{{ $user->reports_previous_month_count }}</td>
                            <td>{{ $user->reports_two_months_ago_count }}</td>
                            <td>{{ $user->reports_count }}</td>
                        </tr>
                    @endforeach

                    <tr class="totals-row">
                        <td>Totalen:</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{ $thisMonth }}</td>
                        <td>{{ $previousMonth }}</td>
                        <td>{{ $twoMonthsAgo }}</td>
                        <td>{{ $total }}</td>
                    </tr>
                    </tbody>
                </table>
                {{ $users->onEachSide(2)->links() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $(".clickable-row").click(function () {
                window.location = $(this).data("href");
            });
        });
    </script>
@endpush
