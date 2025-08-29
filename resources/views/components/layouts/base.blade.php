<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ isset($title) && $title ? $title . ' - ' . config('app.name', 'ScorePredict') : config('app.name', 'ScorePredict') }}</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

        <!-- Additional Styles -->
        {{ $styles ?? '' }}
    </head>
    <body class="h-full bg-smoke-50 dark:bg-smoke-900 text-smoke-900 dark:text-smoke-100 antialiased">
        {{ $slot }}

        @livewireScripts
        @fluxScripts
        
        <!-- Additional Scripts -->
        {{ $scripts ?? '' }}
    </body>
</html>