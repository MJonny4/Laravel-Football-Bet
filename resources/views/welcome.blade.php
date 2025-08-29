<x-layouts.base title="Welcome">
    <x-slot name="styles">
        <style>
            .hero-gradient {
                background: linear-gradient(135deg, var(--color-smoke-50) 0%, var(--color-primary-50) 100%);
            }
            .feature-card {
                @apply bg-white/80 backdrop-blur-sm border border-smoke-200/50 rounded-xl p-6 shadow-sm hover:shadow-md transition-all duration-300;
            }
        </style>
    </x-slot>

    <div class="min-h-screen hero-gradient">
        <x-navbar transparent="true" />
        
        <!-- Hero Section -->
        <div class="relative overflow-hidden py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl md:text-6xl font-bold text-smoke-900 mb-6">
                        Predict. Compete. 
                        <span class="bg-gradient-to-r from-primary-600 to-accent-600 bg-clip-text text-transparent">
                            Win.
                        </span>
                    </h1>
                    <p class="text-xl text-smoke-600 max-w-3xl mx-auto mb-12">
                        Join the ultimate football prediction game. Test your knowledge, compete with friends, and climb the leaderboard in our exciting betting platform.
                    </p>
                    
                    @guest
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="{{ route('register') }}" 
                               class="inline-flex items-center px-8 py-4 bg-primary-600 hover:bg-primary-700 text-white text-lg font-semibold rounded-xl transition-colors shadow-lg hover:shadow-xl">
                                Get Started Free
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                            <a href="{{ route('login') }}" 
                               class="inline-flex items-center px-8 py-4 bg-white hover:bg-smoke-50 text-smoke-900 text-lg font-semibold rounded-xl border border-smoke-200 transition-colors">
                                Sign In
                            </a>
                        </div>
                    @else
                        <div class="flex justify-center">
                            <a href="{{ route('dashboard') }}" 
                               class="inline-flex items-center px-8 py-4 bg-primary-600 hover:bg-primary-700 text-white text-lg font-semibold rounded-xl transition-colors shadow-lg hover:shadow-xl">
                                Go to Dashboard
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-smoke-900 mb-4">Why Choose ScorePredict?</h2>
                    <p class="text-lg text-smoke-600 max-w-2xl mx-auto">
                        Experience the thrill of football predictions with our feature-rich platform
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <div class="feature-card text-center">
                        <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">⚽</span>
                        </div>
                        <h3 class="text-xl font-semibold text-smoke-900 mb-3">Match Predictions</h3>
                        <p class="text-smoke-600">
                            Predict match outcomes, scores, and special events. Test your football knowledge against real results.
                        </p>
                    </div>

                    <div class="feature-card text-center">
                        <div class="w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🏆</span>
                        </div>
                        <h3 class="text-xl font-semibold text-smoke-900 mb-3">Live Leaderboards</h3>
                        <p class="text-smoke-600">
                            Compete with friends and other users. Track your ranking and climb to the top of the leaderboard.
                        </p>
                    </div>

                    <div class="feature-card text-center">
                        <div class="w-12 h-12 bg-secondary-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">📊</span>
                        </div>
                        <h3 class="text-xl font-semibold text-smoke-900 mb-3">Detailed Stats</h3>
                        <p class="text-smoke-600">
                            Analyze your prediction accuracy, track your progress, and improve your football insights.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        @guest
            <div class="py-20 bg-white/50">
                <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2 class="text-3xl font-bold text-smoke-900 mb-4">Ready to Start Predicting?</h2>
                    <p class="text-lg text-smoke-600 mb-8">
                        Join thousands of football fans already competing on ScorePredict
                    </p>
                    <a href="{{ route('register') }}" 
                       class="inline-flex items-center px-8 py-4 bg-primary-600 hover:bg-primary-700 text-white text-lg font-semibold rounded-xl transition-colors shadow-lg hover:shadow-xl">
                        Create Free Account
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            </div>
        @endguest

        <!-- Footer -->
        <footer class="py-12 border-t border-smoke-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <div class="flex items-center justify-center space-x-3 mb-4">
                        <div class="w-8 h-8 bg-gradient-to-br from-primary-400 to-primary-600 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-sm">⚽</span>
                        </div>
                        <span class="font-semibold text-lg text-smoke-900">ScorePredict</span>
                    </div>
                    <p class="text-smoke-600">
                        © {{ date('Y') }} ScorePredict. Built with Laravel and passion for football.
                    </p>
                </div>
            </div>
        </footer>
    </div>
</x-layouts.base>