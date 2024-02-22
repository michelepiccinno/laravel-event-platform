@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Modifica Evento</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row">
            <form action="{{ route('admin.events.update', $event->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name') ?? $event->name }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Data</label>
                    <textarea type="date" class="form-control" id="date" name="date">{{ old('date') ?? $event->date }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="available_tickets" class="form-label">Available Tickets</label>
                    <input type="text" class="form-control @error('available_tickets') is-invalid @enderror"
                        id="available_tickets" name="available_tickets"
                        value="{{ old('available_tickets') ?? $event->available_tickets }}">
                    @error('available_tickets')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tag" class="form-label">TAGS</label>
                    <select class="form-select" name="tags[]" id="tags" multiple>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" {{ $event->tags->contains($tag->id) ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Modifica</button>
            </form>
        </div>
    </div>
@endsection
