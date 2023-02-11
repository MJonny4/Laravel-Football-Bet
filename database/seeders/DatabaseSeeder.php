<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // ! Només utilitzar una vegada
        $this->call(EquipsSeeder::class);
        $this->call(JornadesSeeder::class);
        $this->call(PartitsSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
