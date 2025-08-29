<div class="card-glass rounded-2xl p-6">
    @if (session()->has('success'))
        <div class="mb-4 p-3 bg-primary-50 border border-primary-200 text-primary-700 rounded-xl">
            {{ session('success') }}
        </div>
    @endif
    
    @error('deadline')
        <div class="mb-4 p-3 bg-accent-50 border border-accent-200 text-accent-700 rounded-xl">
            {{ $message }}
        </div>
    @enderror

    <!-- Match Header with Team Logos -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center space-x-6 flex-1">
            <!-- Home Team -->
            <div class="flex items-center space-x-3 flex-1">
                <x-team-logo :team="$match->homeTeam" size="lg" />
                <div class="text-center">
                    <div class="font-semibold text-smoke-900">{{ $match->homeTeam->name }}</div>
                    <div class="text-sm text-smoke-600">{{ $match->homeTeam->short_name }}</div>
                </div>
            </div>
            
            <!-- VS -->
            <div class="text-2xl font-bold text-smoke-400 px-4">vs</div>
            
            <!-- Away Team -->
            <div class="flex items-center space-x-3 flex-1 flex-row-reverse gap-2">
                <x-team-logo :team="$match->awayTeam" size="lg" />
                <div class="text-center">
                    <div class="font-semibold text-smoke-900">{{ $match->awayTeam->name }}</div>
                    <div class="text-sm text-smoke-600">{{ $match->awayTeam->short_name }}</div>
                </div>
            </div>
        </div>
        
        <!-- Match Time -->
        <div class="text-right ml-4">
            <div class="text-sm text-smoke-700 font-medium">{{ $match->kickoff_time->format('M j, g:i A') }}</div>
            <div class="text-xs text-smoke-500">{{ $match->kickoff_time->diffForHumans() }}</div>
        </div>
    </div>

    @if($match->gameweek->betting_deadline > now())
        <!-- Betting Buttons -->
        <div class="grid grid-cols-3 gap-3">
            <!-- Home Win Button -->
            <button 
                wire:click="placeBet('1')"
                class="px-4 py-4 text-center rounded-xl font-medium transition-all duration-300 transform hover:scale-105
                    {{ $selectedPrediction === '1' 
                        ? 'bg-gradient-to-r from-primary-500 to-primary-600 text-white shadow-lg border-2 border-primary-400' 
                        : 'bg-white/80 text-smoke-700 hover:bg-primary-50 border-2 border-smoke-200 hover:border-primary-300' }}"
            >
                <div class="flex items-center justify-center space-x-2 mb-1">
                    <x-team-logo :team="$match->homeTeam" size="xs" />
                    <span class="font-bold text-lg">1</span>
                </div>
                <div class="text-xs opacity-80">{{ $match->homeTeam->short_name }} Win</div>
            </button>
            
            <!-- Draw Button -->
            <button 
                wire:click="placeBet('X')"
                class="px-4 py-4 text-center rounded-xl font-medium transition-all duration-300 transform hover:scale-105
                    {{ $selectedPrediction === 'X' 
                        ? 'bg-gradient-to-r from-secondary-500 to-secondary-600 text-white shadow-lg border-2 border-secondary-400' 
                        : 'bg-white/80 text-smoke-700 hover:bg-secondary-50 border-2 border-smoke-200 hover:border-secondary-300' }}"
            >
                <div class="font-bold text-lg mb-1">X</div>
                <div class="text-xs opacity-80">Draw</div>
            </button>
            
            <!-- Away Win Button -->
            <button 
                wire:click="placeBet('2')"
                class="px-4 py-4 text-center rounded-xl font-medium transition-all duration-300 transform hover:scale-105
                    {{ $selectedPrediction === '2' 
                        ? 'bg-gradient-to-r from-accent-500 to-accent-600 text-white shadow-lg border-2 border-accent-400' 
                        : 'bg-white/80 text-smoke-700 hover:bg-accent-50 border-2 border-smoke-200 hover:border-accent-300' }}"
            >
                <div class="flex items-center justify-center space-x-2 mb-1">
                    <span class="font-bold text-lg">2</span>
                    <x-team-logo :team="$match->awayTeam" size="xs" />
                </div>
                <div class="text-xs opacity-80">{{ $match->awayTeam->short_name }} Win</div>
            </button>
        </div>

        @if($selectedPrediction)
            <div class="mt-4 p-3 bg-primary-50 rounded-xl text-center border border-primary-200">
                <div class="text-primary-700 text-sm font-medium flex items-center justify-center space-x-2">
                    <span>✓</span>
                    <span>Your prediction:</span>
                    @if($selectedPrediction === '1')
                        <x-team-logo :team="$match->homeTeam" size="xs" />
                        <span>{{ $match->homeTeam->short_name }} Win</span>
                    @elseif($selectedPrediction === 'X')
                        <span>Draw</span>
                    @else
                        <x-team-logo :team="$match->awayTeam" size="xs" />
                        <span>{{ $match->awayTeam->short_name }} Win</span>
                    @endif
                </div>
            </div>
        @endif
    @else
        <!-- Betting Closed -->
        <div class="text-center py-6 bg-smoke-50 rounded-xl border border-smoke-200">
            <div class="text-accent-500 font-medium text-lg mb-2">⏰ Betting Closed</div>
            @if($selectedPrediction)
                <div class="text-sm text-smoke-700 flex items-center justify-center space-x-2">
                    <span>Your bet:</span>
                    @if($selectedPrediction === '1')
                        <x-team-logo :team="$match->homeTeam" size="xs" />
                        <span>{{ $match->homeTeam->short_name }} Win</span>
                    @elseif($selectedPrediction === 'X')
                        <span>Draw</span>
                    @else
                        <x-team-logo :team="$match->awayTeam" size="xs" />
                        <span>{{ $match->awayTeam->short_name }} Win</span>
                    @endif
                </div>
            @else
                <div class="text-sm text-smoke-600">No bet placed</div>
            @endif
        </div>
    @endif
</div>