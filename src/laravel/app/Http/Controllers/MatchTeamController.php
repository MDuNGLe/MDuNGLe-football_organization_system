<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreMatchTeamRequest;
use App\Http\Requests\UpdateMatchTeamRequest;
use App\Models\GameMatch;
use App\Models\MatchTeam;

class MatchTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create(GameMatch $match)
    {
        return view('match_team.create', compact('match'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMatchTeamRequest $request)
    {
        // $validated = $request->validated();
        // $match_team = MatchTeam::create($validated);

        // return redirect()->route('match_team.show', ['match_team' => $match_team->id])->with('success', 'Создан матч!');
        $validated = $request->validated();

        $existingTeamsCount = MatchTeam::where('game_match_id', $validated['game_match_id'])->count();

        if ($existingTeamsCount >= 2) {
            return redirect()->back()->with('error', 'В матче не может быть больше двух команд.');
        }

        MatchTeam::create($validated);

        return redirect()->route('matches.teams', ['match' => $validated['game_match_id']])
            ->with('success', 'Команда добавлена в матч.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MatchTeam $matchTeam) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMatchTeamRequest $request, MatchTeam $matchTeam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MatchTeam $matchTeam)
    {
    //    DB::transaction(function () use ($matchTeam) {
    //     $matchId = $matchTeam->game_match_id;
    //     $matchTeam->delete();
    // });

    // return redirect()->route('matches.teams', ['match' => $matchTeam->game_match_id])
    //     ->with('success', 'Команда удалена из матча');
       $matchId = $matchTeam->game_match_id;
    $matchTeam->delete();

    return redirect()
        ->route('matches.teams', $matchId)
        ->with('success', 'Команда удалена!');
    }

    public function teams(GameMatch $match)
    {
        $teams = $match->teams()->withPivot(['goal_moments', 'yellow_cards', 'red_cards'])->get();

        return view('match_team.teams', [
            'teams' => $teams,
            'match' => $match
        ]);
    }
}
