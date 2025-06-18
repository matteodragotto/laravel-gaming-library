<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newGame = new Game();

        $newGame->title = $data['title'];
        $newGame->release_date = $data['release_date'];
        $newGame->developer = $data['developer'];
        $newGame->publisher = $data['publisher'];
        $newGame->description = $data['description'];
        $newGame->trailer_url = $data['trailer_url'];
        $newGame->slug = Str::slug($data['title']);

        if (array_key_exists('cover_image', $data)) {
            $img_url = Storage::putFile('games', $data['cover_image']);
            $newGame->cover_image = $img_url;
        }
        $newGame->save();

        return redirect()->route('games.show', $newGame->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        $data = $request->all();

        $game->title = $data['title'];
        $game->release_date = $data['release_date'];
        $game->developer = $data['developer'];
        $game->publisher = $data['publisher'];
        $game->description = $data['description'];
        $game->trailer_url = $data['trailer_url'];
        $game->slug = Str::slug($data['title']);

        if ($request->hasFile('cover_image')) {
            if ($game->cover_image) {
                Storage::delete($game->cover_image);
            }

            $img_url = Storage::putFile('games', $request->file('cover_image'));
            $game->cover_image = $img_url;
        }

        $game->update();

        return redirect()->route('games.show', $game->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        if ($game->cover_image) {
            Storage::delete($game->cover_image);
        }
        $game->delete();
        return redirect()->route('games.index');
    }
}
