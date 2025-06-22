@extends('layouts.games')

@section('title', 'Games')

@section('content')
    <header class="d-flex justify-content-around align-items-center my-4">
        <h1>Libreria giochi</h1>
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Vai alla dashboard</a>


    </header>

    <div class="container border border-secondary-subtle rounded p-5">
        <a href="{{ route('games.create') }}" class="btn btn-primary">Aggiungi gioco</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Immagine</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Data di rilascio</th>
                    <th scope="col">Sviluppatore</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                @foreach ($games as $game)
                    <tr>
                        <th scope="row align-middle"><img src="{{ asset('storage/' . $game->cover_image) }}" class="w-25"
                                alt="{{ $game->title }}"></th>
                        <td class="align-middle">{{ $game->title }}</td>
                        <td class="align-middle">{{ $game->release_date }}</td>
                        <td class="align-middle">{{ $game->developer }}</td>
                        <td class="align-middle">
                            <div class="d-flex justify-content-center align-items-center gap-3">
                                <a href="{{ route('games.show', $game) }}" class="btn btn-primary">Dettagli</a>
                                <a class="btn btn-warning" href="{{ route('games.edit', $game) }}">Modifica</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $game->id }}">
                                    Elimina
                                </button>
                            </div>


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
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
