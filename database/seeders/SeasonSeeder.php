<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Season::create([
            'name' => '2024/25 Season',
            'year' => 2024,
            'start_date' => '2024-08-15',
            'end_date' => '2025-05-25',
            'active' => true
        ]);
    }
}
