@extends('layouts.admin')

@section('content')
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Nome: {{ $event->name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Data Evento: {{ $event->date }}</h6>
            <p class="card-text">Tickets residui: {{ $event->available_tickets }}</p>
            @foreach ($event->tags as $tag)
                <p class="card-text"></p>
                <h6>{{ $tag->name }}</h6>
            @endforeach
            <p class="card-text">Creato da: {{ $event->user['name'] }}</p>
            <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Indietro</a>
            <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-warning">Modifica</a>
        </div>
    </div>
@endsection
