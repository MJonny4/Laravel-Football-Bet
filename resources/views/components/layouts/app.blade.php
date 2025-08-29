<x-layouts.base :title="$title ?? null">
    <div class="min-h-screen bg-smoke-50 dark:bg-smoke-900">
        <x-navbar />
        
        <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </main>
    </div>
</x-layouts.base>
