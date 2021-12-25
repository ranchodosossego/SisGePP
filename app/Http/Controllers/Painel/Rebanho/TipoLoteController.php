<?php

namespace App\Http\Controllers\Painel\Rebanho;

use App\Http\Controllers\Controller;

use App\Models\TipoLote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class TipoLoteController extends Controller
{

    public function getTipoLote()
    {
        $lstlote = TipoLote::all();
        return DataTables::of($lstlote)
            ->make(true);
    }

    public function obtemTipoLote(Request $request)
    {
        $idtipo_lote = $request->get('tipolote_idlote');

        $lsttipolote = DB::table('lote')
            //->join('lote', 'animal.lote_idlote', '=', 'lote.idlote')
            ->join('tipo_lote', 'tipo_lote.idtipo_lote', '=', 'lote.tipo_lote_idtipo_lote')
            ->where('lote.idlote', '=', $idtipo_lote)
            ->select(['lote.codigo', 'lote.observacao',  'tipo_lote.idtipo_lote', 'tipo_lote.nome'])
            ->get();

        return response()->json([
            'data' => $lsttipolote,
        ]);
    }

}
