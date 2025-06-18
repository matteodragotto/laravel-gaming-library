<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;
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
        $request->validate([
            'title' => 'required|string|max:255',
            'release_date' => 'required|date',
            'developer' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'description' => 'nullable|string',
            'trailer_url' => 'nullable|url',
        ]);

        if (Game::where('slug', Str::slug($data['title']))->exists()) {
            return redirect()->back()->withErrors(['title' => 'A game with this title already exists.']);
        }

        $newGame->title = $data['title'];
        $newGame->release_date = $data['release_date'];
        $newGame->developer = $data['developer'];
        $newGame->publisher = $data['publisher'];
        $newGame->description = $data['description'];
        $newGame->trailer_url = $data['trailer_url'];
        $newGame->slug = Str::slug($data['title']);
        $newGame->save();

        redirect()->route('games.show', $newGame->id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.index');
    }
}
