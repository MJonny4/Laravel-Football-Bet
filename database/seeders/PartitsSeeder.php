<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 3) as $jornada) {
            $equips = DB::table('equips')->get();
            $equips = $equips->shuffle();
            $equips = $equips->toArray();
            $equips = array_chunk($equips, 2);
            foreach ($equips as $equip) {
                DB::table('partits')->insert([
                    'id_jornada' => $jornada,
                    'equip_local' => $equip[0]->id,
                    'equip_visitant' => $equip[1]->id,
                ]);
            }
        }
    }
}
