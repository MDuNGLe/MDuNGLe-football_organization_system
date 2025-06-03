<?php

namespace Database\Seeders;

use App\Models\Formation;
use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formation = Formation::query()->where('name', '=', '4-3-3')->firstOrFail();
        // 4-3-3
        Position::create([
            'formation_id' => $formation->id,
            'name' => 'Голкипер',
            'x' => 3,
            'y' => 0,
        ]);
        Position::create([
            'formation_id' => $formation->id,
            'name' => 'Левый защитник',
            'x' => 0,
            'y' => 1,
        ]);
        Position::create([
            'formation_id' => $formation->id,
            'name' => 'Левый центральный защитник',
            'x' => 2,
            'y' => 1,
        ]);
        Position::create([
            'formation_id' => $formation->id,
            'name' => 'Правый центральный защитник',
            'x' => 4,
            'y' => 1,
        ]);
        Position::create([
            'formation_id' => $formation->id,
            'name' => 'Правый защитник',
            'x' => 6,
            'y' => 1,
        ]);
        Position::create([
            'formation_id' => $formation->id,
            'name' => 'Левый полузащитник',
            'x' => 1,
            'y' => 2,
        ]);
        Position::create([
            'formation_id' => $formation->id,
            'name' => 'Центральный полузащитник',
            'x' => 3,
            'y' => 2,
        ]);
        Position::create([
            'formation_id' => $formation->id,
            'name' => 'Правый полузащитник',
            'x' => 5,
            'y' => 2,
        ]);
        Position::create([
            'formation_id' => $formation->id,
            'name' => 'Левый фланговый нападающий',
            'x' => 1,
            'y' => 3,
        ]);
        Position::create([
            'formation_id' => $formation->id,
            'name' => 'Центральный нападающий',
            'x' => 3,
            'y' => 3,
        ]);
        Position::create([
            'formation_id' => $formation->id,
            'name' => 'Правый фланговый нападающий',
            'x' => 5,
            'y' => 2,
        ]);
        $formation = Formation::query()->where('name', '=', '4-2-1-3')->firstOrFail();
        // 4-2-1-3
        Position::create([
            'formation_id' => $formation->id,
            'name' => 'Голкипер',
            'x' => 4,
            'y' => 0,
        ]);
        Position::create([
            'formation_id' => $formation->id,
            'name' => 'Левый защитник',
            'x' => 0,
            'y' => 1,
        ]);
        Position::create([
            'formation_id' => $formation->id,
            'name' => 'Левый центральный защитник',
            'x' => 3,
            'y' => 1,
        ]);
        Position::create([
            'formation_id' => $formation->id,
            'name' => 'Правый центральный защитник',
            'x' => 5,
            'y' => 1,
        ]);
        Position::create([
            'formation_id' => $formation->id,
            'name' => 'Правый защитник',
            'x' => 8,
            'y' => 1,
        ]);
        Position::create([
            'formation_id' => $formation->id,
            'name' => 'Левый опорный полузащитник',
            'x' => 2,
            'y' => 2,
        ]);
        Position::create([
            'formation_id' => $formation->id,
            'name' => 'Правый опорный полузащитник',
            'x' => 6,
            'y' => 2,
        ]);
        Position::create([
            'formation_id' => $formation->id,
            'name' => 'Левый полузащитник',
            'x' => 1,
            'y' => 3,
        ]);
        Position::create([
            'formation_id' => $formation->id,
            'name' => 'Центральный атакующий полузащитник',
            'x' => 4,
            'y' => 3,
        ]);
        Position::create([
            'formation_id' => $formation->id,
            'name' => 'Правый полузащитник нападающий',
            'x' => 7,
            'y' => 2,
        ]);
        Position::create([
            'formation_id' => $formation->id,
            'name' => 'Центральный нападающий',
            'x' => 4,
            'y' => 4,
        ]);
    }
}
