<x-layouts.betting-app>
    <!-- Header Card -->
    <div class="card-glass rounded-2xl p-8 mb-6">
        <div class="text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-4 text-smoke-900">
                <span class="gradient-text">Football Teams</span>
            </h1>
            <p class="text-smoke-600">Explore all the teams in our prediction platform</p>
        </div>
    </div>

    <!-- Teams Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($teams as $team)
            <div class="card-glass rounded-2xl p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <div class="flex flex-col items-center text-center space-y-4">
                    <!-- Team Logo -->
                    <x-team-logo :team="$team" size="2xl" />
                    
                    <!-- Team Info -->
                    <div class="space-y-2">
                        <h3 class="font-bold text-lg text-smoke-900">{{ $team->name }}</h3>
                        <p class="text-smoke-600 font-medium">{{ $team->short_name }}</p>
                    </div>
                    
                    <!-- Country Badge -->
                    <div class="flex items-center space-x-2">
                        @if($team->country === 'ES')
                            <span class="px-3 py-1 text-md font-semibold rounded-full bg-accent-100 text-accent-800 flex items-center gap-2">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/54/LaLiga_EA_Sports_2023_Vertical_Logo.svg/1920px-LaLiga_EA_Sports_2023_Vertical_Logo.svg.png" alt="La Liga" class="h-4 w-4"> La Liga
                            </span>
                        @elseif($team->country === 'EN')
                            <span class="px-3 py-1 text-md font-semibold rounded-full bg-primary-100 text-primary-800 flex items-center gap-2">
                                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/f/f2/Premier_League_Logo.svg/2560px-Premier_League_Logo.svg.png?20250807061056" alt="La Liga" class="h-4 w-10"> Premier League
                            </span>
                        @else
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-secondary-100 text-secondary-800">
                                {{ $team->country }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    @if($teams->count() === 0)
        <!-- Empty State -->
        <div class="card-glass rounded-2xl p-12 text-center">
            <div class="text-6xl mb-6">⚽</div>
            <h2 class="text-2xl font-bold text-smoke-800 mb-4">No Teams Found</h2>
            <p class="text-smoke-600 mb-6 max-w-md mx-auto">
                No teams are currently available. Please run the database seeder to add sample teams.
            </p>
            <code class="bg-smoke-100 px-4 py-2 rounded-lg text-sm text-smoke-700">
                php artisan db:seed --class=TeamSeeder
            </code>
        </div>
    @endif
</x-layouts.betting-app>