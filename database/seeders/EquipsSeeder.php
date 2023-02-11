<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equips')->insert([
            'nom_equip' => 'FC Barcelona',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Real Madrid',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Atletico Madrid',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Sevilla',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Valencia',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Villareal',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Real Sociedad',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Athletic Bilbao',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Real Betis',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Granada',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Celta Vigo',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Levante',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Osasuna',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Eibar',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Alaves',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Getafe',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Cadiz',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Elche',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Huesca',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Manchester City',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Manchester United',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Liverpool',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Chelsea',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Tottenham',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Arsenal',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Leicester',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Wolves',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Everton',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'West Ham',
        ]);

        DB::table('equips')->insert([
            'nom_equip' => 'Aston Villa',
        ]);
    }
}
