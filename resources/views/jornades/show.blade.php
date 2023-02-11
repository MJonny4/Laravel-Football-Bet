<x-layouts.app
    title="Jornada {{ $jornada->id }}"
>
    <div class="row m-0 p-0 mt-3">
        <div class="col-4 text-end">
            <a href="{{ route('jornades.index') }}">
                <button class="btn btn-primary">
                    Tornar
                </button>
            </a>
        </div>
        <div class="col-4">
            <h1 class="text-center">
                Jornada {{ $jornada->id }}
            </h1>
        </div>
        <div class="col-4 text-start">
            <a href="{{ route('jornades.show', $jornada->id + 1) }}">
                <button class="btn btn-primary">
                    Següent
                </button>
            </a>
        </div>
    </div>
    <div class="container text-center mb-4">
        @foreach($partits as $partit)
            <div class="container">
                <div class="row m-0 p-0" style="border: 2px solid #4a77d4;">
                    <div class="col-4 text-end">
                        <p class="h4">{{ $partit->Local }}</p>
                        <p class="h5 mt-1" style="color: green;">{{ $partit->LocalVots }}</p>
                    </div>
                    <div class="col-4 text-center">
                        <p class="h4">VS</p>
                        <p class="h5 mt-1" style="color: gray">{{ $partit->EmpatVots }}</p>
                    </div>
                    <div class="col-4 text-start">
                        <p class="h4">{{ $partit->Visitant }}</p>
                        <p class="h5 mt-1" style="color: red;">{{ $partit->VisitantVots }}</p>
                    </div>
                </div>
            </div>
        @endforeach
        @guest
            <div></div>
        @else
            <div class="row m-0 p-0 mt-2">
                <div class="col-12 text-center">
                    <a href="{{ route('jornades.export', $jornada->id) }}">
                        <button class="btn btn-primary">
                            Exportar a PDF
                        </button>
                    </a>
                </div>
            </div>
        @endguest
    </div>
</x-layouts.app>
