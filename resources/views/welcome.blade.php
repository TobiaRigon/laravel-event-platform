@extends('layouts.app')
@section('content')
    <h1>EVENTI:</h1>
    <div class="container text-center">
        @foreach ($events as $event)
            <div class="card w-100 mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->name }}</h5>
                    <p class="card-text">{{ $event->description }}</p>
                    <p class="card-text">{{ $event->location }}</p>
                    <p class="card-text">{{ $event->date }}</p>
                    <a href="#" class="btn btn-primary">Edit</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
