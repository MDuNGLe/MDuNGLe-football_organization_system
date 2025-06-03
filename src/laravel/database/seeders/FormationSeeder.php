<?php

namespace Database\Seeders;

use App\Models\Formation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Formation::create([
            'name' => '4-3-3',
        ]);

        Formation::create([
            'name' => '4-2-1-3',
        ]);
    }
}
