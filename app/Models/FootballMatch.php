<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FootballMatch extends Model
{
    protected $table = 'matches';
    
    protected $fillable = [
        'gameweek_id',
        'home_team_id',
        'away_team_id',
        'kickoff_time',
        'home_score',
        'away_score',
        'status',
        'result'
    ];
    
    protected $casts = [
        'kickoff_time' => 'datetime'
    ];
    
    public function gameweek(): BelongsTo
    {
        return $this->belongsTo(Gameweek::class);
    }
    
    public function homeTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }
    
    public function awayTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }
    
    public function bets(): HasMany
    {
        return $this->hasMany(Bet::class, 'match_id');
    }
}
