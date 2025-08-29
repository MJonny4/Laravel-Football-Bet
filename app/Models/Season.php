<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Season extends Model
{
    protected $fillable = [
        'name',
        'year', 
        'start_date',
        'end_date',
        'active'
    ];
    
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'active' => 'boolean'
    ];
    
    public function gameweeks(): HasMany
    {
        return $this->hasMany(Gameweek::class);
    }
    
    public function userStats(): HasMany
    {
        return $this->hasMany(UserStats::class);
    }
}
