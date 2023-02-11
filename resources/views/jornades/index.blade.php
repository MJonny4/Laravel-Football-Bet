<x-layouts.app
    title="Jornades"
>
    <h1 class="text-center">Jornades</h1>
    <div class="container text-center mb-4">
        @foreach ($jornades as $jornada)
            <div class="d-inline-block m-2 p-2 border border-dark rounded"
                 style="width: 200px;"
            >
                <a href="{{ route('jornades.show', $jornada->id) }}">
                    {{ $jornada->id }}
                </a>
            </div>
        @endforeach
    </div>
    @if (Auth::user() && Auth::user()->rol == 1)
        <div class="container text-center mb-4 mt-4">
            <form action="{{ route('jornades.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="jornada" id="jornada">
                <button type="submit" class="btn btn-primary">Afegir jornada</button>
            </form>
        </div>
    @endif
</x-layouts.app>
