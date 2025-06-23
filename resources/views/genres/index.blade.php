@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gestione Generi</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('genres.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome Genere</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="w-full d-flex justify-content-between">

                <button type="submit" class="btn btn-primary">Aggiungi Genere</button>
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Torna alla dashboard</a>

            </div>
        </form>

        <hr>

        <h3>Generi Esistenti</h3>
        <ul class="list-group">
            @foreach ($genres as $genre)
                <li class="list-group-item d-flex justify-content-between">{{ $genre->name }}
                    <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Elimina</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
