<?php

namespace App\Http\Controllers;

use App\Models\Gameweek;
use App\Models\FootballMatch;
use App\Models\Bet;
use Illuminate\Http\Request;

class BettingController extends Controller
{
    public function index()
    {
        $activeGameweek = Gameweek::with([
            'matches.homeTeam', 
            'matches.awayTeam',
            'matches.bets' => function($query) {
                $query->where('user_id', auth()->id());
            }
        ])->where('active', true)->first();
        
        return view('betting.index', compact('activeGameweek'));
    }
}
