<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JornadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jornades')->insert([
            'numero' => 1,
        ]);

        for ($i = 2; $i <= 3; $i++) {
            DB::table('jornades')->insert([
                'numero' => $i,
            ]);
        }
    }
}
