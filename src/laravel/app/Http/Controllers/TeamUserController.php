<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamUserRequest;
use App\Http\Requests\UpdateTeamUserRequest;
use App\Models\MatchTeam;
use App\Models\TeamUser;

class TeamUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamUser $teamUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamUser $teamUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamUserRequest $request, TeamUser $teamUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamUser $teamUser)
    {
        //
    }

     public function positions(MatchTeam $match_team)
    {
        return view('team_user.create');
    }


}
