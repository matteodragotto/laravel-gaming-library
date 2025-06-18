<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::with('genres')->get();
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
}
