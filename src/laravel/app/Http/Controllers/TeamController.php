<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Показать список всех команд.
     */
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }

    /**
     * Показать форму для создания новой команды.
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Сохранить новую команду в базу данных.
     */
    public function store(StoreTeamRequest $request)
    {
        $validated = $request->validated();

        $path = $request->file('emblem')->store('emblems','public');



        if ($path){

            $validated ['emblem'] = $path;
        }

        Team::create($validated);

        return redirect()->route('teams.index')->with('success', 'Команда успешно добавлена!');
    }

    /**
     * Показать форму для редактирования команды.
     */
    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    /**
     * Обновить данные команды в базе.
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        $validated = $request->validated();

        $team->update($validated);

        return redirect()->route('teams.index')->with('success', 'Команда успешно обновлена!');
    }

    /**
     * Удалить команду.
     */
    public function destroy(Team $team)
    {
        Storage::disk('public')->delete($team->emblem);
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Команда успешно удалена!');
    }
}