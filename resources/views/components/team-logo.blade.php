@props([
    'team',
    'size' => 'md',
    'showName' => false,
    'class' => ''
])

@php
    $sizes = [
        'xs' => 'w-6 h-6',
        'sm' => 'w-8 h-8',
        'md' => 'w-12 h-12',
        'lg' => 'w-16 h-16',
        'xl' => 'w-20 h-20',
        '2xl' => 'w-24 h-24',
    ];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
@endphp

<div class="flex items-center {{ $showName ? 'space-x-3' : '' }} {{ $class }}">
    <div class="relative {{ $sizeClass }} flex-shrink-0">
        <img 
            src="{{ $team->logo_url }}" 
            alt="{{ $team->name }} logo"
            class="w-full h-full object-contain rounded-lg relative z-10"
            loading="lazy"
            onload="this.nextElementSibling.style.display='none';"
            onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCA0MCA0MCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGNpcmNsZSBjeD0iMjAiIGN5PSIyMCIgcj0iMjAiIGZpbGw9IiNGM0Y0RjYiLz4KPHN2ZyB4PSI4IiB5PSI4IiB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSI+CjxwYXRoIGQ9Ik0xMiAyQzYuNDggMiAyIDYuNDggMiAxMlM2LjQ4IDIyIDEyIDIyUzIyIDE3LjUyIDIyIDEyUzE3LjUyIDIgMTIgMlpNMTMgMTdIMTFWMTVIMTNWMTdaTTEzIDEzSDExVjdIMTNWMTNaIiBmaWxsPSIjOUI5QjlCIi8+Cjwvc3ZnPgo8L3N2Zz4K'; this.classList.add('opacity-50'); this.nextElementSibling.style.display='none';"
        >
        
        <!-- Loading placeholder while image loads -->
        <div class="absolute inset-0 bg-smoke-100 rounded-lg flex items-center justify-center z-0">
            <svg class="w-1/2 h-1/2 text-smoke-400" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
            </svg>
        </div>
    </div>
    
    @if($showName)
        <div class="flex flex-col min-w-0">
            <span class="font-semibold text-smoke-900 truncate">{{ $team->name }}</span>
            @if($team->short_name)
                <span class="text-sm text-smoke-600">{{ $team->short_name }}</span>
            @endif
        </div>
    @endif
</div>