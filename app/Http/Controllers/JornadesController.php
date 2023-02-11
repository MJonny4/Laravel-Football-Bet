<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Models\Jornada;
use App\Models\Partit;
use Illuminate\Http\Request;

class JornadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $jornades = Jornada::get();

        return view('jornades.index', ['jornades' => $jornades]);
    }

    public function show(Jornada $jornada)
    {
        $sql = "SELECT partits.id, equips.nom_equip AS Local, equips2.nom_equip AS Visitant,
                SUM(CASE WHEN apostes.resultat = '1' THEN 1 ELSE 0 END) AS LocalVots,
                SUM(CASE WHEN apostes.resultat = 'X' THEN 1 ELSE 0 END) AS EmpatVots,
                SUM(CASE WHEN apostes.resultat = '2' THEN 1 ELSE 0 END) AS VisitantVots
                FROM partits
                INNER JOIN equips ON partits.equip_local = equips.id
                INNER JOIN equips AS equips2 ON partits.equip_visitant = equips2.id
                LEFT JOIN apostes ON partits.id = apostes.id_partit
                WHERE partits.id_jornada = $jornada->id
                GROUP BY partits.id, equips.nom_equip, equips2.nom_equip";

        $partits = \DB::select($sql);

        return view('jornades.show', ['partits' => $partits], ['jornada' => $jornada]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'jornada' => 'required|file|mimes:json'
        ]);

        $file = $request->file('jornada');
        $json = json_decode(file_get_contents($file), true);

        $jornada = new Jornada();
        $jornada->numero = $json['jornada'];
        $jornada->save();

        if (count($json['partits']) != 15) {
            return redirect()->route('jornades.index')->with('status', 'El número de partits no és correcte');
        }

        for ($i = 0; $i < count($json['partits']); $i++) {
            $partit = new Partit();
            $partit->id_jornada = $json['jornada'];
            $partit->equip_local = $json['partits'][$i]['equip_local'];
            $partit->equip_visitant = $json['partits'][$i]['equip_visitant'];
            $partit->save();
        }

        return redirect()->route('jornades.index')->with('status', 'Jornada creada correctament');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Jornada $jornada
     * @return \Illuminate\Http\Response
     */
    public function edit(Jornada $jornada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Jornada $jornada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jornada $jornada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Jornada $jornada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jornada $jornada)
    {
        //
    }

    public function export(Jornada $jornada)
    {
        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($this->convert_jornada_to_html($jornada));
        return $pdf->stream();
    }

    private function convert_jornada_to_html(Jornada $jornada)
    {
        $sql = "SELECT partits.id, equips.nom_equip AS Local, equips2.nom_equip AS Visitant,
                SUM(CASE WHEN apostes.resultat = '1' THEN 1 ELSE 0 END) AS LocalVots,
                SUM(CASE WHEN apostes.resultat = 'X' THEN 1 ELSE 0 END) AS EmpatVots,
                SUM(CASE WHEN apostes.resultat = '2' THEN 1 ELSE 0 END) AS VisitantVots
                FROM partits
                INNER JOIN equips ON partits.equip_local = equips.id
                INNER JOIN equips AS equips2 ON partits.equip_visitant = equips2.id
                LEFT JOIN apostes ON partits.id = apostes.id_partit
                WHERE partits.id_jornada = $jornada->id
                GROUP BY partits.id, equips.nom_equip, equips2.nom_equip";

        $partits = \DB::select($sql);

        $output = '
        <h3 align="center">Resultats jornada ' . $jornada->numero . '</h3>
        <table width="100%" style="border-collapse: collapse; border: 0px;">
            <tr>
                <th style="border: 1px solid; padding:12px;" width="30%">Equip Local</th>
                <th style="border: 1px solid; padding:12px;" width="30%">Equip Visitant</th>
                <th style="border: 1px solid; padding:12px;" width="10%">Local</th>
                <th style="border: 1px solid; padding:12px;" width="10%">Empat</th>
                <th style="border: 1px solid; padding:12px;" width="10%">Visitant</th>
            </tr>
        ';

        foreach ($partits as $partit) {
            $output .= '
            <tr>
                <td style="border: 1px solid; padding:12px;">' . $partit->Local . '</td>
                <td style="border: 1px solid; padding:12px;">' . $partit->Visitant . '</td>
                <td style="border: 1px solid; padding:12px;">' . $partit->LocalVots . '</td>
                <td style="border: 1px solid; padding:12px;">' . $partit->EmpatVots . '</td>
                <td style="border: 1px solid; padding:12px;">' . $partit->VisitantVots . '</td>
            </tr>
            ';
        }

        $output .= '</table>';
        return $output;
    }
}
