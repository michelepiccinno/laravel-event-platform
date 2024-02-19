@extends('layouts.admin')

@section('content')
    <ul>
        <li>Nome: {{ $event->name }}</li>
        <li>Data Evento: {{ $event->date }}</li>
        <li>Tickets residui: {{ $event->available_tickets }}</li>
    </ul>
    @foreach ($event->tags as $tag)
        <h6>{{ $tag->name }}</h6>
    @endforeach

    <a href="{{ route("admin.events.index") }}" class="btn btn-secondary">Indietro</a>
    {{-- <a href="{{ route("admin.events.edit") }}" class="btn btn-secondary">Modifica</a> --}}
@endsection
