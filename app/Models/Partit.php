<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partit extends Model
{
    const create = [
        'id_jornada' => ['required', 'integer'],
        'equip_local' => ['required', 'integer'],
        'equip_visitant' => ['required', 'integer']
    ];

    protected $table = 'partits';

    protected $fillable = [
        'id_jornada',
        'equip_local',
        'equip_visitant',
    ];
}
