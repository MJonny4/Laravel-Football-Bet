<x-layouts.betting-app>
    @if($activeGameweek && $activeGameweek->matches->count() > 0)
        <!-- Header Card -->
        <div class="card-glass rounded-2xl p-8">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">
                    <span class="gradient-text">{{ $activeGameweek->name }}</span>
                </h1>
                <div class="flex items-center justify-center space-x-4 text-smoke-600">
                    <div class="flex items-center space-x-2">
                        <span class="text-primary-500">⏰</span>
                        <span>Deadline: {{ $activeGameweek->betting_deadline->format('M j, g:i A') }}</span>
                    </div>
                    <div class="w-px h-4 bg-smoke-300"></div>
                    <div class="flex items-center space-x-2">
                        <span class="text-accent-500">⚽</span>
                        <span>{{ $activeGameweek->matches->count() }} Matches</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Matches Grid -->
        <div class="space-y-6">
            @foreach($activeGameweek->matches as $match)
                <livewire:match-betting :match="$match" :key="$match->id" />
            @endforeach
        </div>

        <!-- Footer Info -->
        <div class="card-glass rounded-2xl p-6 text-center">
            <div class="flex items-center justify-center space-x-2 text-smoke-600">
                <span class="text-primary-500">💡</span>
                <span class="text-sm">You can change your predictions until the deadline!</span>
            </div>
        </div>
    @else
        <!-- No Matches State -->
        <div class="card-glass rounded-2xl p-12 text-center">
            <div class="text-6xl mb-6">⚽</div>
            <h2 class="text-2xl font-bold text-smoke-800 mb-4">No Active Gameweek</h2>
            <p class="text-smoke-600 mb-6 max-w-md mx-auto">
                There are currently no matches available for betting. New gameweeks are added regularly!
            </p>
            <a href="{{ route('teams.index') }}" 
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-primary-500 to-accent-500 text-white rounded-xl font-medium hover:from-primary-600 hover:to-accent-600 transition-all shadow-lg hover:shadow-xl">
                <span>Browse Teams</span>
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    @endif
</x-layouts.betting-app>