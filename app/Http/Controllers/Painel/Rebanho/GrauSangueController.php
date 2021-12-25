<?php

namespace App\Http\Controllers\Painel\Rebanho;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\GrauSangue;

class GrauSangueController extends Controller
{
    //
    public function getGrauSangue(Request $request)
    {
        $raca_idraca = $request->all();
        $lstgrausangue = DB::table('grau_sangue')
            ->where('raca_idraca', '=', $raca_idraca)
            ->get();


        // $lstanimal = DB::table('animal')
        //     ->join('lote', 'animal.lote_idlote', '=', 'lote.idlote')
        //     ->join('tipo_lote', 'tipo_lote.idtipo_lote', '=', 'lote.tipo_lote_idtipo_lote')
        //     ->where('animal.ativo', '=', '1')
        //     ->get();

        return response()->json([
            'status' => 200,
            'message' => 'Novo Animal salvo com sucesso.',
            'objeto' => $lstgrausangue,
        ]);
    }
}
