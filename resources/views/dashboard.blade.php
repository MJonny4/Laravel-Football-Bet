<x-layouts.app :title="__('Dashboard')">
    <div class="space-y-8">
        <!-- Welcome Header -->
        <div class="bg-white rounded-xl border border-smoke-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-smoke-900">Welcome back, {{ auth()->user()->name }}!</h1>
                    <p class="text-smoke-600 mt-1">Ready to make some predictions?</p>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-primary-600">⚽</div>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl border border-smoke-200 p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center">
                        <span class="text-xl">🎯</span>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-smoke-900">Total Predictions</h3>
                        <p class="text-2xl font-bold text-primary-600">0</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-smoke-200 p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center">
                        <span class="text-xl">🏆</span>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-smoke-900">Accuracy</h3>
                        <p class="text-2xl font-bold text-accent-600">0%</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-smoke-200 p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center">
                        <span class="text-xl">📊</span>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-smoke-900">Ranking</h3>
                        <p class="text-2xl font-bold text-secondary-600">-</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-white rounded-xl border border-smoke-200 p-6">
                <h3 class="text-lg font-semibold text-smoke-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="{{ route('betting.index') }}" class="flex items-center p-3 rounded-lg hover:bg-smoke-50 transition-colors">
                        <span class="text-xl mr-3">⚽</span>
                        <div>
                            <div class="font-medium text-smoke-900">Make Predictions</div>
                            <div class="text-sm text-smoke-600">Predict upcoming matches</div>
                        </div>
                    </a>
                    <a href="{{ route('leaderboard.index') }}" class="flex items-center p-3 rounded-lg hover:bg-smoke-50 transition-colors">
                        <span class="text-xl mr-3">🏆</span>
                        <div>
                            <div class="font-medium text-smoke-900">View Leaderboard</div>
                            <div class="text-sm text-smoke-600">See how you rank</div>
                        </div>
                    </a>
                    <a href="{{ route('teams.index') }}" class="flex items-center p-3 rounded-lg hover:bg-smoke-50 transition-colors">
                        <span class="text-xl mr-3">👕</span>
                        <div>
                            <div class="font-medium text-smoke-900">Browse Teams</div>
                            <div class="text-sm text-smoke-600">Explore team information</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-smoke-200 p-6">
                <h3 class="text-lg font-semibold text-smoke-900 mb-4">Recent Activity</h3>
                <div class="text-center py-8 text-smoke-500">
                    <span class="text-3xl">📭</span>
                    <p class="mt-2">No recent activity</p>
                    <p class="text-sm">Start making predictions to see your activity here</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
