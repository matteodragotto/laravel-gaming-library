@extends('layouts.games')

@section('content')
    <div class="container">
        <h1>Modifica le informazioni del gioco</h1>

        <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data" class="form-control">
            @csrf

            @method('PUT')

            <div class="mb-3 d-flex flex-column">
                <label for="title">Titolo del gioco</label>
                <input type="text" name="title" id="title" value="{{ $game->title }}" class="form-control" required>
            </div>

            <div class="mb-3 d-flex flex-column">
                <label for="release_date">Data di rilascio</label>
                <input type="text" name="release_date" id="release_date" value="{{ $game->release_date }}"
                    class="form-control" required>
            </div>

            <div class="mb-3 d-flex flex-column">
                <label for="developer">Sviluppatore</label>
                <input type="text" name="developer" id="developer" value="{{ $game->developer }}" class="form-control"
                    required>
            </div>

            <div class="mb-3 d-flex flex-column">
                <label for="publisher">Publisher</label>
                <input type="text" name="publisher" id="publisher" value="{{ $game->publisher }}" class="form-control"
                    required>
            </div>

            <div class="mb-3 d-flex flex-column">
                <label for="description">Descrizione</label>
                <textarea name="description" id="description" class="form-control" required>{{ $game->description }}</textarea>
            </div>


            <div class="mb-3 d-flex flex-wrap">
                <label for="cover_image">Immagine di copertina</label>
                <input type="file" name="cover_image" id="cover_image" class="form-control">

                @if ($game->cover_image)
                    <div class="container">
                        <img src="{{ asset('storage/' . $game->cover_image) }}" class="img-fluid w-25 mb-4"
                            alt="{{ $game->title }}">
                    </div>
                @endif
            </div>

            <div class="mb-3 d-flex flex-column">
                <label for="trailer_url">Link del trailer</label>
                <input type="text" name="trailer_url" id="trailer_url" value="{{ $game->trailer_url }}"
                    class="form-control" required>
            </div>

            <input type="submit" value="Modifica gioco" class="btn btn-primary">
            <a href="{{ route('games.index') }}" class="btn btn-primary">Annulla e torna alla libreria</a>





        </form>
    </div>
@endsection
