<?php

namespace App\Http\Controllers;

use App\Models\Aposta;
use App\Models\Jornada;
use App\Models\Partit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApostesController extends Controller
{
    public function index()
    {
        $jornades = Jornada::get();

        return view('apostes.index', ['jornades' => $jornades]);
    }

    public function show(Jornada $jornada)
    {
        $partits = Partit::select('partits.id', 'equips.nom_equip AS Local', 'equips2.nom_equip AS Visitant')
            ->join('equips', 'partits.equip_local', '=', 'equips.id')
            ->join('equips AS equips2', 'partits.equip_visitant', '=', 'equips2.id')
            ->where('partits.id_jornada', '=', $jornada->id)
            ->get();

        $apostes = Aposta::select('apostes.id', 'apostes.id_usuari', 'apostes.id_partit', 'apostes.resultat', 'partits.id_jornada', 'partits.equip_local', 'partits.equip_visitant')
            ->join('partits', 'apostes.id_partit', '=', 'partits.id')
            ->where('partits.id_jornada', '=', $jornada->id)
            ->where('apostes.id_usuari', '=', Auth::user()->id)
            ->get();

        return view('apostes.show', ['jornada' => $jornada, 'partits' => $partits, 'apostes' => $apostes]);

    }

    public function store(Request $request, Jornada $jornada)
    {
        foreach ($request->aposta as $key => $value) {
            $aposta = new Aposta();
            $aposta->id_partit = $key;
            $aposta->id_usuari = Auth::user()->id;
            if ($value == null) {
                $value = 0;
            }
            $aposta->resultat = $value;
            $aposta->save();
        }
        return redirect()->route('apostes.index')->with('status', 'Apostes guardades correctament');
    }

    public function create()
    {
        //
    }

    public function edit(Aposta $aposta)
    {
        //
    }

    public function update(Request $request, Aposta $aposta)
    {
        foreach ($request->aposta as $key => $value) {
            $aposta = Aposta::where('id_usuari', '=', Auth::user()->id)
                ->where('id_partit', '=', $key)
                ->delete();
        }

        foreach ($request->aposta as $key => $value) {
            $aposta = new Aposta();
            $aposta->id_partit = $key;
            $aposta->id_usuari = Auth::user()->id;
            if ($value == null) {
                $value = 0;
            }
            $aposta->resultat = $value;
            $aposta->save();
        }
        return redirect()->route('apostes.index')->with('status', 'Apostes guardades correctament');
    }

    public function destroy(Aposta $aposta)
    {
        //
    }
}
