<x-layouts.betting-app>
    <!-- Header Card -->
    <div class="island-card p-8 mb-6">
        <div class="text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">
                🏆 <span class="gradient-text">Leaderboard</span>
            </h1>
            <p class="text-slate-600">
                See how you rank against the best predictors in the world
            </p>
        </div>
    </div>

    <div class="island-card">
        <div class="p-8">
                    
                    @if($leaderboard->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Position
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Player
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Points
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Bets
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Accuracy
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($leaderboard as $user)
                                        <tr class="{{ auth()->id() === $user->id ? 'bg-blue-50' : '' }}">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    @if($user->position <= 3)
                                                        <span class="text-2xl">
                                                            @if($user->position === 1) 🥇
                                                            @elseif($user->position === 2) 🥈
                                                            @else 🥉
                                                            @endif
                                                        </span>
                                                    @else
                                                        <span class="text-lg font-semibold text-gray-600">{{ $user->position }}</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-8 w-8">
                                                        <div class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center text-white text-sm font-medium">
                                                            {{ $user->initials() }}
                                                        </div>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $user->name }}
                                                            @if(auth()->id() === $user->id)
                                                                <span class="text-blue-500">(You)</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-bold text-gray-900">{{ $user->total_points ?? 0 }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">
                                                    <span class="font-medium text-green-600">{{ $user->correct_bets }}</span>
                                                    /
                                                    <span class="text-gray-600">{{ $user->total_bets }}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $user->accuracy }}%</div>
                                                <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                                    <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $user->accuracy }}%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <div class="text-gray-400 text-6xl mb-4">🏆</div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">No Rankings Yet</h3>
                            <p class="text-sm text-gray-600">
                                Start placing bets to see the leaderboard!
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.betting-app>