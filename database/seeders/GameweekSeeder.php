<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameweekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $season = \App\Models\Season::where('active', true)->first();
        
        for ($i = 1; $i <= 5; $i++) {
            \App\Models\Gameweek::create([
                'season_id' => $season->id,
                'number' => $i,
                'name' => 'Gameweek ' . $i,
                'betting_deadline' => now()->addDays($i * 7)->setTime(14, 0),
                'active' => $i === 1,
                'results_finalized' => false
            ]);
        }
    }
}
