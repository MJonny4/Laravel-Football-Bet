<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    const create = [
        'numero' => ['required', 'integer']
    ];

    protected $table = 'jornades';

    protected $fillable = [
        'numero'
    ];
}
