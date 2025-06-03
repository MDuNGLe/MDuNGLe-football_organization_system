<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameMatchRequest;
use App\Http\Requests\UpdateGameMatchRequest;
use App\Http\Resources\FullCalendarMatchCollection;
use App\Models\Field;
use App\Models\GameMatch;
use App\Models\MatchTeam;
use Illuminate\Http\Request;

class GameMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $matches = GameMatch::all();
        if ($request->wantsJson())
            return new FullCalendarMatchCollection($matches);
        else
            return view('matches.index', compact('matches'));
    }


    public function create()
    {
        $fields = Field::all();
        return view('matches.create', compact('fields'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameMatchRequest $request)
    {
        $validated = $request->validated();
        GameMatch::create($validated);

        return redirect()->route('match_team.create')->with('success', 'Матч успешно добавлен!');
    }

    /**
     * Display the specified resource.
     */
    public function show(GameMatch $match)
    {
        $teams = MatchTeam::with('team')
            ->where('game_match_id', $match->id)
            ->get();

        return view('match_team.teams', compact('match', 'teams'));
    }

    public function edit(GameMatch $match)
    {
        $fields = Field::all();
        return view('matches.edit', compact('fields', 'match'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameMatchRequest $request, GameMatch $match)
    {
        $validated = $request->validated();
        $match->update($validated);

        return redirect()->route('matches.index')->with('success', 'Матч успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GameMatch $match)
    {
        $match->delete();
        return redirect()->route('matches.index')->with('success', 'Матч успешно удален!');
    }
}
