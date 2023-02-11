<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aposta extends Model
{
    use HasFactory;

    protected $table = 'apostes';
    protected $fillable = [
        'id_usuari',
        'id_partit',
        'resultat'
    ];
}
