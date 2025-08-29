@props(['transparent' => false])

<nav class="{{ $transparent ? 'bg-transparent' : 'bg-white/80 backdrop-blur-md border-b border-smoke-200' }} sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-gradient-to-br from-primary-400 to-primary-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-sm">⚽</span>
                    </div>
                    <span class="font-semibold text-lg text-smoke-900 dark:text-smoke-100">ScorePredict</span>
                </a>
            </div>

            <!-- Navigation Links -->
            @auth
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('dashboard') }}" 
                       class="text-sm font-medium {{ request()->routeIs('dashboard') ? 'text-primary-600' : 'text-smoke-600 hover:text-smoke-900' }} transition-colors">
                        Dashboard
                    </a>
                    <a href="{{ route('betting.index') }}" 
                       class="text-sm font-medium {{ request()->routeIs('betting.*') ? 'text-primary-600' : 'text-smoke-600 hover:text-smoke-900' }} transition-colors">
                        Predictions
                    </a>
                    <a href="{{ route('leaderboard.index') }}" 
                       class="text-sm font-medium {{ request()->routeIs('leaderboard.*') ? 'text-primary-600' : 'text-smoke-600 hover:text-smoke-900' }} transition-colors">
                        Leaderboard
                    </a>
                    <a href="{{ route('teams.index') }}" 
                       class="text-sm font-medium {{ request()->routeIs('teams.*') ? 'text-primary-600' : 'text-smoke-600 hover:text-smoke-900' }} transition-colors">
                        Teams
                    </a>
                </div>

                <!-- User Menu -->
                <div class="flex items-center space-x-4">
                    <flux:dropdown position="bottom" align="end">
                        <flux:profile
                            :name="auth()->user()->name"
                            :initials="auth()->user()->initials()"
                            class="text-sm"
                        />

                        <flux:menu class="w-64">
                            <flux:menu.radio.group>
                                <div class="px-4 py-3 border-b border-smoke-100">
                                    <div class="text-sm font-medium text-smoke-900">{{ auth()->user()->name }}</div>
                                    <div class="text-xs text-smoke-600">{{ auth()->user()->email }}</div>
                                </div>
                            </flux:menu.radio.group>

                            <flux:menu.radio.group>
                                <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>
                                    Settings
                                </flux:menu.item>
                            </flux:menu.radio.group>

                            <flux:menu.separator />

                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full text-accent-600">
                                    Sign Out
                                </flux:menu.item>
                            </form>
                        </flux:menu>
                    </flux:dropdown>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-smoke-600 hover:text-smoke-900 p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            @else
                <!-- Guest Navigation -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" 
                       class="text-sm font-medium text-smoke-600 hover:text-smoke-900 transition-colors">
                        Sign In
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" 
                           class="inline-flex items-center px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white text-sm font-medium rounded-lg transition-colors">
                            Get Started
                        </a>
                    @endif
                </div>
            @endauth
        </div>
    </div>

    <!-- Mobile Menu -->
    @auth
        <div id="mobile-menu" class="md:hidden hidden border-t border-smoke-200 bg-white/90 backdrop-blur-md">
            <div class="px-4 py-4 space-y-3">
                <a href="{{ route('dashboard') }}" 
                   class="block text-sm font-medium {{ request()->routeIs('dashboard') ? 'text-primary-600' : 'text-smoke-600' }}">
                    Dashboard
                </a>
                <a href="{{ route('betting.index') }}" 
                   class="block text-sm font-medium {{ request()->routeIs('betting.*') ? 'text-primary-600' : 'text-smoke-600' }}">
                    Predictions
                </a>
                <a href="{{ route('leaderboard.index') }}" 
                   class="block text-sm font-medium {{ request()->routeIs('leaderboard.*') ? 'text-primary-600' : 'text-smoke-600' }}">
                    Leaderboard
                </a>
                <a href="{{ route('teams.index') }}" 
                   class="block text-sm font-medium {{ request()->routeIs('teams.*') ? 'text-primary-600' : 'text-smoke-600' }}">
                    Teams
                </a>
                <div class="border-t border-smoke-200 pt-3">
                    <a href="{{ route('settings.profile') }}" 
                       class="block text-sm font-medium text-smoke-600">
                        Settings
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="mt-2">
                        @csrf
                        <button type="submit" class="text-sm font-medium text-accent-600">
                            Sign Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endauth
</nav>

@auth
<script>
document.addEventListener('DOMContentLoaded', function() {
    const button = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');
    
    if (button && menu) {
        button.addEventListener('click', function() {
            menu.classList.toggle('hidden');
        });
    }
});
</script>
@endauth