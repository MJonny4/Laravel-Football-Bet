<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ScorePredict') }} - {{ $title ?? 'Premium Football Betting' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        
        <style>
            body { font-family: 'Inter', sans-serif; }
            .island-card { 
                @apply bg-white/80 backdrop-blur-xl rounded-2xl border border-white/20 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-1; 
            }
            .gradient-bg { 
                background: linear-gradient(135deg, var(--color-smoke-50) 0%, var(--color-primary-50) 30%, var(--color-accent-50) 100%); 
            }
            .gradient-text { 
                background: linear-gradient(135deg, var(--color-primary-600) 0%, var(--color-accent-600) 100%); 
                -webkit-background-clip: text; 
                -webkit-text-fill-color: transparent; 
                background-clip: text; 
            }
            .floating-orb {
                position: absolute;
                border-radius: 50%;
                background: radial-gradient(circle, rgba(13, 148, 136, 0.3) 0%, rgba(220, 38, 38, 0.15) 100%);
                filter: blur(40px);
                animation: float 6s ease-in-out infinite;
            }
            @keyframes float {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(-20px) rotate(180deg); }
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="min-h-screen gradient-bg relative overflow-hidden">
            <!-- Floating Background Orbs -->
            <div class="floating-orb w-96 h-96 -top-48 -left-48" style="animation-delay: 0s;"></div>
            <div class="floating-orb w-80 h-80 top-1/4 -right-40" style="animation-delay: 2s;"></div>
            <div class="floating-orb w-64 h-64 bottom-1/4 left-1/3" style="animation-delay: 4s;"></div>
            
            <!-- Navigation -->
            <nav class="relative z-50">
                <div class="max-w-7xl mx-auto px-6 py-6">
                    <div class="island-card p-4">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-primary-400 to-primary-600 rounded-xl flex items-center justify-center">
                                    <span class="text-white font-bold text-lg">⚽</span>
                                </div>
                                <span class="font-bold text-xl gradient-text">ScorePredict</span>
                            </div>
                            
                            <div class="hidden md:flex items-center space-x-8">
                                <a href="{{ route('home') }}" class="text-smoke-700 hover:text-primary-600 font-medium transition-colors">Home</a>
                                <a href="{{ route('about') }}" class="text-smoke-700 hover:text-primary-600 font-medium transition-colors">About</a>
                                <div class="w-px h-6 bg-smoke-200"></div>
                                <a href="{{ route('login') }}" class="text-smoke-700 hover:text-primary-600 font-medium transition-colors">Sign In</a>
                                <a href="{{ route('register') }}" class="bg-gradient-to-r from-primary-500 to-accent-500 text-white px-6 py-2 rounded-xl font-medium hover:from-primary-600 hover:to-accent-600 transition-all transform hover:scale-105 shadow-lg">
                                    Get Started
                                </a>
                            </div>
                            
                            <!-- Mobile Menu Button -->
                            <div class="md:hidden">
                                <button class="text-smoke-700 hover:text-primary-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="relative z-10">
                {{ $slot }}
            </main>

            <!-- Footer -->
            <footer class="relative z-10 mt-20">
                <div class="max-w-7xl mx-auto px-6 pb-12">
                    <div class="island-card p-8">
                        <div class="grid md:grid-cols-4 gap-8">
                            <div class="space-y-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-gradient-to-br from-primary-400 to-primary-600 rounded-lg flex items-center justify-center">
                                        <span class="text-white font-bold">⚽</span>
                                    </div>
                                    <span class="font-bold gradient-text">ScorePredict</span>
                                </div>
                                <p class="text-smoke-600">The ultimate football prediction platform for passionate fans.</p>
                            </div>
                            
                            <div>
                                <h3 class="font-semibold text-smoke-800 mb-4">Platform</h3>
                                <div class="space-y-2">
                                    <a href="#" class="block text-smoke-600 hover:text-primary-600 transition-colors">How it Works</a>
                                    <a href="#" class="block text-smoke-600 hover:text-primary-600 transition-colors">Pricing</a>
                                    <a href="#" class="block text-smoke-600 hover:text-primary-600 transition-colors">Features</a>
                                </div>
                            </div>
                            
                            <div>
                                <h3 class="font-semibold text-smoke-800 mb-4">Company</h3>
                                <div class="space-y-2">
                                    <a href="{{ route('about') }}" class="block text-smoke-600 hover:text-primary-600 transition-colors">About Us</a>
                                    <a href="#" class="block text-smoke-600 hover:text-primary-600 transition-colors">Contact</a>
                                    <a href="#" class="block text-smoke-600 hover:text-primary-600 transition-colors">Privacy</a>
                                </div>
                            </div>
                            
                            <div>
                                <h3 class="font-semibold text-smoke-800 mb-4">Legal</h3>
                                <div class="space-y-2">
                                    <a href="#" class="block text-smoke-600 hover:text-primary-600 transition-colors">Terms</a>
                                    <a href="#" class="block text-smoke-600 hover:text-primary-600 transition-colors">Responsible Gaming</a>
                                    <a href="#" class="block text-smoke-600 hover:text-primary-600 transition-colors">18+ Only</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="border-t border-smoke-200 mt-8 pt-8 text-center text-smoke-500">
                            <p>&copy; {{ date('Y') }} ScorePredict. All rights reserved. Please gamble responsibly.</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        
        @livewireScripts
    </body>
</html>