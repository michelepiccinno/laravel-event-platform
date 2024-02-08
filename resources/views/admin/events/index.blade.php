@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4 py-4">
                @foreach ($events as $event)
                    <div class="col">
                        <div class="card">
                            <div class="card-header">{{ $event->name }}</div>
                            <h6 class="card-subtitle mb-2 text-muted">
                                {{ $event->category ? $event->category->name : 'senza categoria' }}
                            </h6>
                            <div class="card-body">{{ $event->description }}</div>
                            <div class="card-body">
                                @if (count($event->tags) > 0)
                                    <ul>
                                        @foreach ($event->tags as $tag)
                                            <li>{{ $tag->name }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span>Non ci sono tag collegati</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
