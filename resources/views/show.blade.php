@extends('layouts.app')
@section('content')
    <h1>EVENTO:</h1>
    <div class="text-center">
        <h5 class="card-title">{{ $event->name }}</h5>
        <p class="card-text">{{ $event->description }}</p>
        <p class="card-text">{{ $event->location }}</p>
        <p class="card-text">{{ $event->date }}</p>
        <p class="card-text">{{ $event->user_id }}</p>
        <a href="{{ route('event.welcome') }}">Torna alla HOME</a>
    </div>
@endsection
