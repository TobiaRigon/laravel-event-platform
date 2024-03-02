@extends('layouts.app')
@section('content')
    <form action="{{ route('event.store') }}" method="POST" class="container text-center">

        @csrf
        @method('POST')

        <label for="name">Nome Evento:</label>
        <input class="my-1" placeholder="Inserisci evento" type="text" name="name" id="name">
        <br>

        <label for="description">Descrizione:</label>
        <input class="my-1" type="text" name="description" id="description">
        <br>

        <label for="location">Location:</label>
        <input class="my-1" placeholder="Inserisci location" type="text" name="location" id="location">
        <br>

        <label for="date">Data:</label>
        <input class="my-1" type="date" name="date" id="date">
        <br>

        <label for="user_id">User</label>
        <select name="user_id" id="user_id">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">
                    {{ $user->id }}
                </option>
            @endforeach
        </select>
        <br>
        <br>

        @foreach ($tags as $tag)
            <div>
                <input type="checkbox" name="tags" value="{{ $tag->id }}" id="tag{{ $tag->id}}">
                <label for="tag{{ $tag->id}}">{{ $tag->category }}</label>
            </div>  
        @endforeach

        <input class="my-1" type="submit" value="Aggiungi!">
    </form>
@endsection
