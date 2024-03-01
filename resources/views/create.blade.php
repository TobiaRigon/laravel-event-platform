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

        <input class="my-1" type="submit" value="Aggiungi!">
    </form>
@endsection
