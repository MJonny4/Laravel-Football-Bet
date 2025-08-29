<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-gradient-to-br from-smoke-100 via-smoke-50 to-primary-100/50 antialiased">
        <div class="flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
            <div class="flex w-full max-w-sm flex-col gap-2">
                <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium mb-4" wire:navigate>
                    <div class="flex h-12 w-12 items-center justify-center bg-gradient-to-br from-primary-400 to-primary-600 rounded-xl mb-2">
                        <span class="text-white font-bold text-xl">⚽</span>
                    </div>
                    <span class="text-xl font-bold bg-gradient-to-r from-primary-600 to-accent-600 bg-clip-text text-transparent">
                        {{ config('app.name', 'ScorePredict') }}
                    </span>
                </a>
                <div class="bg-smoke-50/90 backdrop-blur-xl rounded-2xl border border-smoke-200/50 shadow-xl p-8">
                    {{ $slot }}
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
