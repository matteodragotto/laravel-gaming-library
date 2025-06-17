@extends('layouts.games')

@section('title', $game->title)


@section('content')
    <div class="container text-center my-4">
        <h1>{{ $game->title }}</h1>
        <p>Data di rilascio: {{ $game->release_date }}</p>
        <p>Sviluppatore: {{ $game->developer }}</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="{{ $game->cover_image }}" class="img-fluid mb-4" alt="{{ $game->title }}">
                <p>{{ $game->description }}</p>
            </div>
        </div>
    </div>
