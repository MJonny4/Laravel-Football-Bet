<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bet;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        $leaderboard = User::withCount([
            'bets as total_bets',
            'bets as correct_bets' => function($query) {
                $query->where('is_correct', true);
            }
        ])
        ->withSum('bets as total_points', 'points_awarded')
        ->having('total_bets', '>', 0)
        ->orderByDesc('total_points')
        ->orderByDesc('correct_bets')
        ->get()
        ->map(function($user, $index) {
            $user->position = $index + 1;
            $user->accuracy = $user->total_bets > 0 
                ? round(($user->correct_bets / $user->total_bets) * 100, 1) 
                : 0;
            return $user;
        });

        return view('leaderboard.index', compact('leaderboard'));
    }
}
