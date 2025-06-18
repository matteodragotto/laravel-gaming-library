@extends('layouts.games')

@section('title, Games')

@section('content')
    <div class="container text-center my-4">
        <h1>Benvenuto nella pagina di gestione della libreria giochi</h1>
        <a href="{{ route('games.create') }}" class="btn btn-primary">Aggiungi gioco</a>

    </div>

    <div class="container">
        <div class="row">
            @foreach ($games as $game)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ asset('storage/' . $game->cover_image) }}" class="card-img-top" alt="{{ $game->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $game->title }}</h5>
                            <p class="card-text">Data di rilascio: {{ $game->release_date }}</p>
                            <p class="card-text">Sviluppatore: {{ $game->developer }}</p>


                            <a href="{{ route('games.show', $game) }}" class="btn btn-primary">Dettagli</a>
                            <a class="btn btn-warning" href="{{ route('games.edit', $game) }}">Modifica</a>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $game->id }}">
                                Elimina
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{ $game->id }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel{{ $game->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteModalLabel{{ $game->id }}">Modal
                                                title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Sicuro di volere eliminare il gioco "{{ $game->title }}"?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Annulla</button>
                                            <form action="{{ route('games.destroy', $game) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger" value="Elimina">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
