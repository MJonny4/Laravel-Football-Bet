<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseUrl = 'https://raw.githubusercontent.com/luukhopman/football-logos/main';
        
        $teams = [
            // La Liga Teams
            [
                'name' => 'Real Madrid', 
                'short_name' => 'RMA', 
                'country' => 'ES',
                'logo_url' => "$baseUrl/la-liga/real-madrid.png"
            ],
            [
                'name' => 'FC Barcelona', 
                'short_name' => 'BAR', 
                'country' => 'ES',
                'logo_url' => "$baseUrl/la-liga/barcelona.png"
            ],
            [
                'name' => 'Atlético Madrid', 
                'short_name' => 'ATM', 
                'country' => 'ES',
                'logo_url' => "$baseUrl/la-liga/atletico-madrid.png"
            ],
            [
                'name' => 'Valencia CF', 
                'short_name' => 'VAL', 
                'country' => 'ES',
                'logo_url' => "$baseUrl/la-liga/valencia.png"
            ],
            [
                'name' => 'Sevilla FC', 
                'short_name' => 'SEV', 
                'country' => 'ES',
                'logo_url' => "$baseUrl/la-liga/sevilla.png"
            ],
            [
                'name' => 'Real Betis', 
                'short_name' => 'BET', 
                'country' => 'ES',
                'logo_url' => "$baseUrl/la-liga/real-betis.png"
            ],
            [
                'name' => 'Real Sociedad', 
                'short_name' => 'RSO', 
                'country' => 'ES',
                'logo_url' => "$baseUrl/la-liga/real-sociedad.png"
            ],
            [
                'name' => 'Athletic Bilbao', 
                'short_name' => 'ATH', 
                'country' => 'ES',
                'logo_url' => "$baseUrl/la-liga/athletic-bilbao.png"
            ],
            [
                'name' => 'Villarreal CF', 
                'short_name' => 'VIL', 
                'country' => 'ES',
                'logo_url' => "$baseUrl/la-liga/villarreal.png"
            ],
            
            // Premier League Teams
            [
                'name' => 'Manchester City', 
                'short_name' => 'MCI', 
                'country' => 'EN',
                'logo_url' => "$baseUrl/premier-league/manchester-city.png"
            ],
            [
                'name' => 'Manchester United', 
                'short_name' => 'MUN', 
                'country' => 'EN',
                'logo_url' => "$baseUrl/premier-league/manchester-united.png"
            ],
            [
                'name' => 'Arsenal', 
                'short_name' => 'ARS', 
                'country' => 'EN',
                'logo_url' => "$baseUrl/premier-league/arsenal.png"
            ],
            [
                'name' => 'Chelsea', 
                'short_name' => 'CHE', 
                'country' => 'EN',
                'logo_url' => "$baseUrl/premier-league/chelsea.png"
            ],
            [
                'name' => 'Liverpool', 
                'short_name' => 'LIV', 
                'country' => 'EN',
                'logo_url' => "$baseUrl/premier-league/liverpool.png"
            ],
            [
                'name' => 'Tottenham', 
                'short_name' => 'TOT', 
                'country' => 'EN',
                'logo_url' => "$baseUrl/premier-league/tottenham.png"
            ],
        ];
        
        foreach ($teams as $team) {
            \App\Models\Team::create($team);
        }
    }
}
