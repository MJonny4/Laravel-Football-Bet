<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gameweek extends Model
{
    protected $fillable = [
        'season_id',
        'number',
        'name',
        'betting_deadline',
        'active',
        'results_finalized'
    ];
    
    protected $casts = [
        'betting_deadline' => 'datetime',
        'active' => 'boolean',
        'results_finalized' => 'boolean'
    ];
    
    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }
    
    public function matches(): HasMany
    {
        return $this->hasMany(FootballMatch::class);
    }
}
