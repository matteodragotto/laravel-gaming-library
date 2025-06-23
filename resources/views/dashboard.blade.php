@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('User Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Hai effettuato il login!') }}

                    </div>
                    <a href="{{ route('games.index') }}" class="btn btn-primary m-2">Gestine Libreria Giochi</a>
                    <a href="{{ route('genres.index') }}" class="btn btn-primary m-2">Gestione Generi</a>
                    <a href="{{ route('platforms.index') }}" class="btn btn-primary m-2">Gestione Piattaforme</a>


                </div>

            </div>
        </div>
    </div>
@endsection
