<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFieldRequest;
use App\Http\Requests\UpdateFieldRequest;
use App\Models\Field;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fields = Field::all();
        // $fields = Field::query()->where()->get();
        return view('fields.index', compact('fields'));

    }

    public function create ()
    {
        return view('fields.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFieldRequest $request)
    {
        $validated = $request->validated();

        Field::create($validated);

        return redirect()->route('fields.index')->with('success', 'Команда успешно добавлена!');
    }

    // Редактирование

    public function edit(Field $field)
    {
        return view('fields.edit', compact('field'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Field $field)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFieldRequest $request, Field $field)
    {
        $validated = $request->validated();

        $field->update($validated);

        return redirect()->route('fields.index')->with('success', 'Поле успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Field $field)
    {
        $field->delete();
        return redirect()->route('fields.index')->with('succes', 'Поле успешно удалено');
    }
}
