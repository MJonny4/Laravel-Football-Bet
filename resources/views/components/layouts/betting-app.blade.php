<x-layouts.base title="Betting">
    <x-slot name="styles">
        <style>
            .card-glass {
                @apply bg-white/70 backdrop-blur-md border border-white/20 shadow-lg hover:shadow-xl transition-all duration-300;
            }
            .gradient-text {
                background: linear-gradient(135deg, var(--color-primary-500) 0%, var(--color-accent-500) 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
        </style>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-smoke-50 via-white to-primary-50/30">
        <x-navbar />
        
        <!-- Page Content -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="space-y-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</x-layouts.base>