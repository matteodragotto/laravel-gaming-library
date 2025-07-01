@extends('layouts.games')

@section('title', $game->title)


@section('content')
    <div class="container text-center my-4">
        <h1>{{ $game->title }}</h1>

        <a href="{{ route('games.index') }}" class="btn btn-primary">Torna alla libreria</a>

        <a class="btn btn-warning" href="{{ route('games.edit', $game) }}">Modifica</a>

        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $game->id }}">
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Sicuro di volere eliminare il gioco "{{ $game->title }}"?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
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

    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">
                @if ($game->cover_image)
                    <div class="container w-50">
                        <img src="{{ asset('storage/' . $game->cover_image) }}" class="img-fluid mb-4"
                            alt="{{ $game->title }}" style="object-fit: fill; width: 100%;">
                    </div>
                @endif

                <p><strong>Data di rilascio</strong>: {{ $game->release_date }}</p>
                <p><strong>Sviluppatore</strong>: {{ $game->developer }}</p>
                @if (count($game->platforms) > 0)
                    <small>
                        <strong>Piattaforme</strong>:
                        @foreach ($game->platforms as $platform)
                            <span class="badge"
                                style="background-color: {{ $platform->color }}">{{ $platform->name }}</span>
                        @endforeach
                    </small>
                @endif
                @if (count($game->genres) > 0)
                    <p>
                        <strong>Generi</strong>:
                        @foreach ($game->genres as $genre)
                            <span class="badge text-bg-dark">{{ $genre->name }}</span>
                        @endforeach
                    </p>
                @endif
                <p><strong>Descrizione</strong>: {{ $game->description }}</p>


            </div>
        </div>
    </div>
