@extends('layouts.app')
@section('content')

    <form action="" method="POST" class="container text-center">

        @csrf
        @method('PUT')

        <label for="name">Nome Evento:</label>
        <input class="my-1" placeholder="Inserisci Nome Evento" type="text" name="name" id="name" value="{{$event->name}}">
        <br>

        <label for="description">Descrizione:</label>
        <input class="my-1" type="text" name="description" id="description"
        value="{{$event->description}}">
        <br>

        <label for="location">Location:</label>
        <input class="my-1" placeholder="Inserisci location" type="text" name="location" id="location" value="{{$event->location}}">
        <br>

        <label for="date">Data:</label>
        <input class="my-1" type="date" name="date" id="date" value="{{$event->date}}">
        <br>

        <input class="my-1" type="submit" value="Modifica!">
    </form>
@endsection
