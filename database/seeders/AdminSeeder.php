<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nom' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'rol' => 1,
            'actiu' => 1,
            'token' => Null,
        ]);
    }
}
