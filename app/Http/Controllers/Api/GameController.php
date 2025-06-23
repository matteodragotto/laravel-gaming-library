<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Genre;
use App\Models\Platform;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::orderBy('title')->with('genres')->simplePaginate(8);
        return response()->json(
            [
                'success' => true,
                'data' => $games,
            ],
        );
    }

    public function show(Game $game)
    {
        $game->load('genres', 'platforms');

        return response()->json(
            [
                'success' => true,
                'data' => $game,
            ],
        );
    }

    public function genres()
    {
        $genres = Genre::all();
        return response()->json(
            [
                'success' => true,
                'data' => $genres,
            ],
        );
    }

    public function platforms()
    {
        $platforms = Platform::all();

        return response()->json(
            [
                'success' => true,
                'data' => $platforms,
            ],
        );
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $genreId = $request->input('genre_id');
        $platformId = $request->input('platform_id');

        $games = Game::with('genres', 'platforms')
            ->when($query, function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%');
            })
            ->when($genreId, function ($q) use ($genreId) {
                $q->whereHas('genres', function ($q2) use ($genreId) {
                    $q2->where('genre_id', $genreId);
                });
            })
            ->when($platformId, function ($q) use ($platformId) {
                $q->whereHas('platforms', function ($q2) use ($platformId) {
                    $q2->where('platform_id', $platformId);
                });
            })
            ->get();

        return response()->json(
            [
                'success' => true,
                'data' => $games,
            ],
        );
    }
}
