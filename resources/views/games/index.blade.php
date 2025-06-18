@extends('layouts.games')

@section('title, Games')

@section('content')
    <div class="container text-center my-4">
        <h1>Games</h1>
        <p>Welcome to the games page!</p>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($games as $game)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ $game->cover_image }}" class="card-img-top" alt="{{ $game->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $game->title }}</h5>
                            <p class="card-text">Data di rilascio: {{ $game->release_date }}</p>
                            <p class="card-text">Sviluppatore: {{ $game->developer }}</p>
                            <a href="{{ route('games.show', $game) }}" class="btn btn-primary">Dettagli</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
