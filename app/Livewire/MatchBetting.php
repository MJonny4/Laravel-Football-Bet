<?php

namespace App\Livewire;

use App\Models\FootballMatch;
use App\Models\Bet;
use Livewire\Component;

class MatchBetting extends Component
{
    public FootballMatch $match;
    public $selectedPrediction;
    
    public function mount(FootballMatch $match)
    {
        $this->match = $match;
        
        // Load existing bet if any
        $existingBet = Bet::where('user_id', auth()->id())
                          ->where('match_id', $match->id)
                          ->first();
                          
        $this->selectedPrediction = $existingBet?->prediction;
    }
    
    public function placeBet($prediction)
    {
        // Check if betting deadline has passed
        if ($this->match->gameweek->betting_deadline < now()) {
            $this->addError('deadline', 'Betting deadline has passed for this match.');
            return;
        }
        
        // Update or create bet
        Bet::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'match_id' => $this->match->id,
            ],
            [
                'prediction' => $prediction
            ]
        );
        
        $this->selectedPrediction = $prediction;
        
        session()->flash('success', 'Bet placed successfully!');
    }
    
    public function render()
    {
        return view('livewire.match-betting');
    }
}
