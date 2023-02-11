<x-layouts.app
    title="Aposta Jornada {{ $jornada->id }}"
>
    @if($apostes->count() > 0)
        <div class="container text-center mt-3">
            <h1>Jornada {{ $jornada->id }}</h1>
            <form method="POST" action="{{ route('apostes.update', $jornada->id) }}">
                @csrf
                @method('PUT')
                <table border="2" style="margin: 0 auto;">
                    <tr>
                        <th>Local</th>
                        <th>VS</th>
                        <th>Visitant</th>
                        <th>Guanya Local</th>
                        <th>Empat</th>
                        <th>Guanya Visitant</th>
                    </tr>
                    @foreach($partits as $partit)
                        <tr>
                            <td>{{ $partit->Local }}</td>
                            <td>VS</td>
                            <td>{{ $partit->Visitant }}</td>
                            <input type="hidden" name="partit[{{ $partit->id }}]" value="{{ $partit->id }}">
                            <td><input type="radio" name="aposta[{{ $partit->id }}]" value="1"
                                       @if($apostes->where('id_partit', $partit->id)->first()->resultat == 1) checked @endif>
                            </td>
                            <td><input type="radio" name="aposta[{{ $partit->id }}]" value="X"
                                       @if($apostes->where('id_partit', $partit->id)->first()->resultat == 'X') checked @endif>
                            </td>
                            <td><input type="radio" name="aposta[{{ $partit->id }}]" value="2"
                                       @if($apostes->where('id_partit', $partit->id)->first()->resultat == 2) checked @endif>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <button type="submit" class="btn btn-primary mt-2 mb-2">Guardar</button>
            </form>
        </div>
    @else
        <div class="container text-center mt-3">
            <h1>Jornada {{ $jornada->id }}</h1>
            <form method="POST" action="{{ route('apostes.store', $jornada->id) }}">
                @csrf
                <table border="2" style="margin: 0 auto;">
                    <tr>
                        <th>Local</th>
                        <th>VS</th>
                        <th>Visitant</th>
                        <th>Guanya Local</th>
                        <th>Empat</th>
                        <th>Guanya Visitant</th>
                    </tr>
                    @foreach($partits as $partit)
                        <tr>
                            <td>{{ $partit->Local }}</td>
                            <td>VS</td>
                            <td>{{ $partit->Visitant }}</td>
                            <input type="hidden" name="partit[{{ $partit->id }}]" value="{{ $partit->id }}">
                            <td><input type="radio" name="aposta[{{ $partit->id }}]" value="1"></td>
                            <td><input type="radio" name="aposta[{{ $partit->id }}]" value="X"></td>
                            <td><input type="radio" name="aposta[{{ $partit->id }}]" value="2"></td>
                        </tr>
                    @endforeach
                </table>
                <button type="submit" class="btn btn-primary mt-2 mb-2">Apostar</button>
            </form>
        </div>
    @endif
</x-layouts.app>
