@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4 py-4">
                @foreach ($events as $event)
                    <div class="col">
                        <div class="card">
                            <div class="card-header">{{ $event->name }}</div>
                            <div class="card-body">
                                <p>Ticket Residui: {{ $event->available_tickets }}</p>
                                <p>{{ $event->date }}</p>
                                @if (count($event->tags) > 0)
                                    <ul>
                                        @foreach ($event->tags as $tag)
                                            <li><span>Tag: </span>{{ $tag->name }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span>Non ci sono tag collegati</span>
                                @endif
                                <p>Utente: {{ $event->user['name'] }}</p>
                                <a href="{{ route('admin.events.show', $event->id) }}" class="btn btn-primary">DETTAGLI</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
