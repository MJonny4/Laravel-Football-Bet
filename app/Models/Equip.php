<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;


class Equip
{
    protected $fillable = ['nom_equip'];

    public static function create(array $array)
    {
        $equip = new Equip();
        $equip->nom_equip = $array['nom_equip'];
        $equip->save();
    }

    public function save()
    {
        $conn = Factory::create('mysql');
        $conn->table('equips')->insert([
            'nom_equip' => $this->nom_equip,
        ]);
    }


}
