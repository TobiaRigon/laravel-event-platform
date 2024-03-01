@extends('layouts.app')
@section('content')
    <h1>EVENTI:</h1>
    <h2><a href="{{route('event.create')}}">CREA EVENTO</a></h2>
    <div class="container text-center">
        @foreach ($events as $event)
            <div class="card w-100 mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->name }}</h5>
                    <a href="{{ route('event.show', $event->id) }}" class="btn btn-primary">Show</a>
                    <form action="{{ route('event.delete', $event->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <input type="submit" value="Delete" class="btn btn-primary mt-2">
                    </form>
                    <a class="btn btn-primary mt-2" href="{{ route('event.edit', $event -> id ) }}">Modifica</a>

                </div>
            </div>
        @endforeach
    </div>
@endsection
