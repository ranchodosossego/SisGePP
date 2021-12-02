<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use App\Models\Animal;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class LoteController extends Controller
{

    public function getAnimalList()
    {
        $lstanimal = DB::table('animal')
        ->join('lote', 'animal.lote_idlote', '=', 'lote.idlote')
        ->join('tipo_lote', 'tipo_lote.idtipo_lote', '=', 'lote.tipo_lote_idtipo_lote')
        ->where('animal.ativo', '=', '1')
        ->select(['animal.numero_brinco', 'animal.nome', 'animal.dias_vida', 'animal.apelido', 'animal.genero','tipo_lote.nome  as tnome'])
        ->get();

        return DataTables::of($lstanimal)->make(true);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lstanimal = DB::table('animal')
            ->join('lote', 'animal.lote_idlote', '=', 'lote.idlote')
            ->join('tipo_lote', 'tipo_lote.idtipo_lote', '=', 'lote.tipo_lote_idtipo_lote')
            ->where('animal.ativo', '=', '1')
            ->get();
        return view('painel.rebanho.lote', compact('lstanimal'));
    }

}
