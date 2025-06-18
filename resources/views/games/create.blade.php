@extends('layouts.games')

@section('content')
    <div class="container">
        <h1>Create a New Game</h1>
        <form action="{{ route('games.store') }}" method="POST">
            @csrf

            <div class="form-control mb-3 d-flex flex-column">
                <label for="title">Titolo del gioco</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-control mb-3 d-flex flex-column">
                <label for="release_date">Data di rilascio</label>
                <input type="text" name="release_date" id="release_date" class="form-control" required>
            </div>

            <div class="form-control mb-3 d-flex flex-column">
                <label for="developer">Sviluppatore</label>
                <input type="text" name="developer" id="developer" class="form-control" required>
            </div>

            <div class="form-control mb-3 d-flex flex-column">
                <label for="publisher">Publisher</label>
                <input type="text" name="publisher" id="publisher" class="form-control" required>
            </div>

            <div class="form-control mb-3 d-flex flex-column">
                <label for="description">Descrizione</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>

            <div class="form-control mb-3 d-flex flex-column">
                <label for="trailer_url">Link del trailer</label>
                <input type="text" name="trailer_url" id="trailer_url" class="form-control" required>
            </div>

            <input type="submit" value="Crea progetto" class="btn btn-primary">




        </form>
    </div>
@endsection
