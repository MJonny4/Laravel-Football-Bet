<x-layouts.public title="Premium Football Predictions">
    <!-- Hero Section -->
    <section class="relative px-6 py-10">
        <div class="max-w-7xl mx-auto">
            <!-- Hero Content -->
            <div class="text-center mb-16">
                <div class="island-card p-12 mb-8">
                    <h1 class="text-5xl md:text-7xl font-bold mb-6">
                        Predict. <span class="gradient-text">Compete.</span> Win.
                    </h1>
                    <p class="text-xl md:text-2xl text-smoke-600 mb-8 max-w-3xl mx-auto leading-relaxed">
                        Join the ultimate football prediction platform where your football knowledge pays off. 
                        Compete with friends, climb leaderboards, and prove you're the ultimate football oracle.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                        <a href="{{ route('register') }}" 
                           class="bg-gradient-to-r from-primary-500 to-accent-500 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:from-primary-600 hover:to-accent-600 transition-all transform hover:scale-105 shadow-xl">
                            Start Predicting Free
                        </a>
                        <a href="{{ route('about') }}" 
                           class="text-smoke-700 hover:text-primary-600 font-semibold text-lg flex items-center space-x-2 transition-colors">
                            <span>Learn More</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Features Grid -->
            <div class="grid md:grid-cols-3 gap-8 mb-20">
                <div class="island-card p-8 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-primary-400 to-primary-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <span class="text-2xl">⚽</span>
                    </div>
                    <h3 class="text-2xl font-bold text-smoke-800 mb-4">Live Predictions</h3>
                    <p class="text-smoke-600 leading-relaxed">
                        Make predictions on live matches with real-time updates. Our advanced system tracks every game across major leagues.
                    </p>
                </div>
                
                <div class="island-card p-8 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-accent-400 to-accent-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <span class="text-2xl">🏆</span>
                    </div>
                    <h3 class="text-2xl font-bold text-smoke-800 mb-4">Leaderboards</h3>
                    <p class="text-smoke-600 leading-relaxed">
                        Compete with players worldwide. Rise through the ranks and prove you have the best football intuition on the planet.
                    </p>
                </div>
                
                <div class="island-card p-8 text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-secondary-400 to-secondary-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <span class="text-2xl">📊</span>
                    </div>
                    <h3 class="text-2xl font-bold text-smoke-800 mb-4">Smart Analytics</h3>
                    <p class="text-smoke-600 leading-relaxed">
                        Get detailed insights into your prediction patterns, accuracy rates, and performance trends to improve your game.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="px-6 py-4">
        <div class="max-w-7xl mx-auto">
            <div class="island-card p-12">
                <div class="text-center mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold mb-6">
                        Trusted by <span class="gradient-text">Football Fans</span> Worldwide
                    </h2>
                    <p class="text-xl text-smoke-600 max-w-2xl mx-auto">
                        Join thousands of passionate football fans who have made ScorePredict their go-to prediction platform.
                    </p>
                </div>
                
                <div class="grid md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="text-4xl font-bold gradient-text mb-2">50K+</div>
                        <div class="text-smoke-600">Active Predictors</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold gradient-text mb-2">1M+</div>
                        <div class="text-smoke-600">Predictions Made</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold gradient-text mb-2">500+</div>
                        <div class="text-smoke-600">Leagues Covered</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold gradient-text mb-2">24/7</div>
                        <div class="text-smoke-600">Live Updates</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="px-6 py-20">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    How It <span class="gradient-text">Works</span>
                </h2>
                <p class="text-xl text-smoke-600 max-w-2xl mx-auto">
                    Get started in minutes and begin your journey to becoming a prediction legend.
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="island-card p-8 text-center">
                    <div class="w-12 h-12 bg-primary-500 text-white rounded-full flex items-center justify-center mx-auto mb-6 text-xl font-bold">1</div>
                    <h3 class="text-xl font-bold text-smoke-800 mb-4">Sign Up Free</h3>
                    <p class="text-smoke-600">Create your account in seconds. No credit card required, just your passion for football.</p>
                </div>
                
                <div class="island-card p-8 text-center">
                    <div class="w-12 h-12 bg-accent-500 text-white rounded-full flex items-center justify-center mx-auto mb-6 text-xl font-bold">2</div>
                    <h3 class="text-xl font-bold text-smoke-800 mb-4">Make Predictions</h3>
                    <p class="text-smoke-600">Choose from upcoming matches and predict outcomes. Use your football knowledge to your advantage.</p>
                </div>
                
                <div class="island-card p-8 text-center">
                    <div class="w-12 h-12 bg-secondary-500 text-white rounded-full flex items-center justify-center mx-auto mb-6 text-xl font-bold">3</div>
                    <h3 class="text-xl font-bold text-smoke-800 mb-4">Climb Rankings</h3>
                    <p class="text-smoke-600">Earn points for correct predictions and watch yourself rise through the global leaderboards.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="px-6 py-20">
        <div class="max-w-4xl mx-auto">
            <div class="island-card p-12 text-center">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    Ready to <span class="gradient-text">Dominate</span>?
                </h2>
                <p class="text-xl text-smoke-600 mb-8 max-w-2xl mx-auto">
                    Join the most exciting football prediction community and turn your football knowledge into legendary status.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="{{ route('register') }}" 
                       class="bg-gradient-to-r from-primary-500 to-accent-500 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:from-primary-600 hover:to-accent-600 transition-all transform hover:scale-105 shadow-xl">
                        Start Your Journey
                    </a>
                    <div class="text-smoke-500 text-sm">
                        18+ only • Responsible gaming • Free to play
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.public>