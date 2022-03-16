<?php

namespace App\Http\Controllers\Painel\Estoque;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

use Illuminate\Http\Request;
use App\Models\Estoque;

class EstoqueController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    }

    public function racao()
    {
        $lstalimento = [];
        $lstalimento = DB::table('alimento')
            ->where('alimento.ativo', '=', '1')
            ->orderBy('nome', 'asc')
            ->get();
        return view('painel.estoque.racao', compact('lstalimento'));
    }

    public function getEstoqueAlimento(Request $request)
    {
        $alimento_id = $request->input('volumoso_id');
        $estoque = [];

        $est_ini = DB::table('alimento')
            ->where('idalimento', '=', $alimento_id)
            ->get();

        $estoque = DB::table('estoque')
            ->join('unidade_medida', 'estoque.unidade_medida_idunidade_medida', '=', 'unidade_medida.idunidade_medida')
            ->where('estoque.alimento_idalimento', '=', $alimento_id)
            ->select([
                'estoque.quantidade',
                'unidade_medida.sigla',
                'estoque.data_update',
            ])
            ->get();

        if (count($estoque)) {
            $estoque = $this->order_alimento($estoque);
        }
        else {

        }
        return $estoque;
    }

    private function order_alimento($obj)
    {
        $itens = [];
        $result = [];
        $data = 0;

        foreach ($obj as $item) {
            $data = Carbon::parse($item->data_update)->format('d/m/Y');
            $itens["idalimento"] = $item->idalimento;
            $itens["nome"] = $item->nome;
            $itens["quantidade"] = $item->quantidade;
            $itens["sigla"] = $item->sigla;
            $itens["data_update"] = $data;
            array_push($result, $itens);
        }

        return $result;
    }
}
