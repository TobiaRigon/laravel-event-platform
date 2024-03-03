@extends('layouts.app')
@section('content')

    <div class="card w-50 mx-auto mt-4">
        <div class="card-header text-center">
            <h1>[ {{ $event -> id}} ] {{ $event->name }}</h1>
        </div>
        <div class="card-body text-center">
            <p class="card-text"><strong>Descrizione: </strong>{{ $event->description }}</p>
            <span class="card-text d-block"><strong>Luogo: </strong>{{ $event->location }}</p>
            <span class="card-text d-block"><strong>Inizio Evento: </strong>{{ $event->date }}</p>
            <span class="card-text d-block"><strong>Organizzatore: </strong>{{ $user->name }}</p>

            <h3 class="mt-3 mb-2">Tags:</h3>
            @foreach ($event->tags as $tag)
            <div>
                <span>#{{$tag->category}}</span>
            </div>
            @endforeach

            @auth
                <a class="btn btn-warning mt-2" href="{{ route('event.edit', $event -> id ) }}">Modifica Evento</a>

                <form action="{{ route('event.delete', $event->id) }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <input type="submit" value="Cancella Evento" class="btn btn-danger mt-2">
                </form>
            @endauth
        </div>
    </div>

    <div class="text-center my-4">
        <a class="btn btn-primary mb-2" href="{{route('event.welcome')}}">Torna alla HOME</a>
    </div>

@endsection
