@extends('layouts.mail')

@section('content')
    <h3>Hi, {{ $client->user->name }}</h3>

    <p>
        Je heeft een rapport aanvraag gedaan voor jouw client: {{ $client->full_name }}.
        pdf.
    </p>
    <p>
        <u>
            <a class="font-weight-bold" href="{{ route('reports.download', $client->report) }}">
                De PDF is hier te downloaden
            </a>
        </u>
    </p>
    <p>
        Met vriendelijke groet,
    </p>
    <p>
        Team Tweekracht
    </p>
@endsection
