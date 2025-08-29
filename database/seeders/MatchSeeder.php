<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gameweek = \App\Models\Gameweek::where('active', true)->first();
        $teams = \App\Models\Team::all();
        
        $fixtures = [
            ['Real Madrid', 'FC Barcelona'],
            ['Manchester City', 'Manchester United'],
            ['Arsenal', 'Chelsea'],
            ['Liverpool', 'Tottenham'],
            ['Atlético Madrid', 'Valencia CF'],
            ['Sevilla FC', 'Real Betis'],
            ['Real Sociedad', 'Athletic Bilbao'],
            ['Villarreal CF', 'Real Madrid']
        ];
        
        foreach ($fixtures as $index => $fixture) {
            $homeTeam = $teams->where('name', $fixture[0])->first();
            $awayTeam = $teams->where('name', $fixture[1])->first();
            
            if ($homeTeam && $awayTeam) {
                \App\Models\FootballMatch::create([
                    'gameweek_id' => $gameweek->id,
                    'home_team_id' => $homeTeam->id,
                    'away_team_id' => $awayTeam->id,
                    'kickoff_time' => now()->addDays($index + 1)->setTime(15 + ($index % 3), 0),
                    'status' => 'scheduled'
                ]);
            }
        }
    }
}
