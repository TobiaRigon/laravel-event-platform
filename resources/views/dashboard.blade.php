@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 my-4 text-success text-center">
        Ciao! {{ Auth::user()->name }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card w-50 mx-auto">
                <div class="card-header text-center"><h3>{{ __('Funzioni utente') }}</h3></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="text-center">
                        <a class="btn btn-primary my-2 me-2" href="{{route('event.welcome')}}">Vai alla HOME</a>
                        <a class="btn btn-success my-2" href="{{route('event.create')}}">Crea un nuovo Evento</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
