<x-layouts.app
    title="Apostes"
>
    <div class="container text-center mt-3">
        @guest()
            <h1>Has d'estar registrat per poder apostar</h1>
        @else
            <h1>Apostes</h1>
            @foreach ($jornades as $jornada)
                <div class="d-inline-block m-2 p-2 border border-dark rounded"
                     style="width: 150px;"
                >
                    <a href="{{ route('apostes.show', $jornada->id) }}">
                        {{ $jornada->id }}
                    </a>
                </div>
            @endforeach
        @endguest
    </div>
</x-layouts.app>
