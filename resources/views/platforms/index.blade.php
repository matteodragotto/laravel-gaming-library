@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gestione Piattaforme</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('platforms.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome Piattaforma</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Colore Piattaforma</label>
                <input type="text" name="color" class="form-control" required pattern="^#[0-9A-Fa-f]{6}$"
                    maxlength="7" placeholder="#FFFFFF">
            </div>
            <div class="w-full d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Aggiungi Piattaforma</button>
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Torna alla dashboard</a>
            </div>

        </form>

        <hr>

        <h3>Piattaforme Esistenti</h3>
        <ul class="list-group">
            @foreach ($platforms as $platform)
                <li class="list-group-item d-flex justify-content-between">{{ $platform->name }}
                    <form action="{{ route('platforms.destroy', $platform->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Elimina</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
