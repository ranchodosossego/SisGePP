<?php

namespace App\Http\Controllers\Painel\Alimentacao;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

use Illuminate\Http\Request;
use App\Models\Dieta;
use App\Models\Lote;
use App\Models\Alimento;
use App\Models\Enpl;
use App\Models\Mspl;

class DietaController extends Controller
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
        $lstalimento = DB::table('alimento')
            ->where('alimento.ativo', '=', '1')
            ->get();

        $lstlote = Lote::all();
        return view('painel.alimentacao.dieta', compact('lstlote', 'lstalimento'));
    }

    public function getDieta(Request $request)
    {
        // Validação
        $validator = Validator::make($request->all(), [
            'volumoso_ids' => ['required|integer'],
            'concentrado_ids' => ['required|integer'],
            'peso_vivo' => ['required|integer|min:1|max:1500'],
            'prodleitedia' => ['required|integer|min:0|max:100'],
            'perc_gordura' => ['required|integer|min:1|max:5'],
        ]);
        $volumoso_ids = $request->input('volumoso_ids');
        $concentrado_ids = $request->input('concentrado_ids');
        $peso_vivo = $request->input('peso_vivo');
        $prodleitedia = $request->input('prodleitedia');
        $perc_gordura = $request->input('perc_gordura');
        $em_lactacao = ($prodleitedia > 0) ? 1 : 0;

        //--: Arredonda peso vivo para ficar de acordo com as tabelas de exigências nutricionais
        $peso_vivo = $this->arred_pesovivo($peso_vivo);

        //--: Calcula o total de matéria seca
        $ms = $this->calcular_consumo_ms($peso_vivo, $prodleitedia);

        //--: Nutrientes necessários para a MANUTENÇÃO DA VIDA
        $arrnutrientes = $this->nutrientes_manutencao($em_lactacao, $peso_vivo);

        //--: Nutrientes necessários para a PRODUÇÃO DESEJADA DE LEITE
        $arrnut_prod_leite = ($prodleitedia > 0) ? $this->nutrientes_producaoleite($perc_gordura, $prodleitedia) : null;

        //--: EXIGÊNCIA NUTRICIONAL FINAL
        $exigencia_final = $this->exigencia_nutricional_final($arrnutrientes, $arrnut_prod_leite);

        //--: NUTRIENTES VOLUMOSOS
        $nut_volumosos = $this->get_nutriente_alimento($volumoso_ids, 1);
        $nut_concentrado = $this->get_nutriente_alimento($concentrado_ids, 2);
        $nut_suplemento =  $this->get_nutriente_alimento($concentrado_ids, 8);
        return response()->json([
            'status' => 200,
            'peso_vivo' => $exigencia_final,
        ]);
    }

    private function get_nutriente_alimento($alimento_ids, $classealimento)
    {
        $lstnutrientesalimentos = DB::table('alimento')
        ->whereIn('idalimento', $alimento_ids)
        ->where('ativo', '=' , 1)
        ->where('classe_alimento_idclasse_alimento', '=' , $classealimento)
        ->select('idalimento','nome','ms','ndt','pb','ca','p')
        ->get();
        return $lstnutrientesalimentos;
    }

    /**
     * Undocumented function
     *
     * @param [type] $en_minima
     * @param [type] $en_producao_leite
     * @return void
     */
    private function exigencia_nutricional_final($en_minima, $en_producao_leite)
    {
        if (is_null($en_producao_leite)) {
            return $en_minima;
        } else {
            $mult_value = [];
            foreach ($en_minima as $en_key => $en_value) {
                if (array_key_exists($en_key, $en_producao_leite)) {
                    $mult_value = Arr::add($mult_value, $en_key, ($en_value + $en_producao_leite[$en_key]));
                }
            }
            return $mult_value;
        }
        return null;
    }

    private function nutrientes_producaoleite($perc_gordura, $prodleitedia)
    {
        $producaoleite = DB::table('enpl')
            ->where('gordura', '=', $perc_gordura)
            ->get();

        $mult_value = [];
        foreach ($producaoleite as &$value) {
            $mult_value = Arr::add($mult_value, 'idenpl', $value->idenpl);
            $mult_value = Arr::add($mult_value, 'gordura', $value->gordura);
            $mult_value = Arr::add($mult_value, 'em', $value->em);
            $mult_value = Arr::add($mult_value, 'ndt', $value->ndt * $prodleitedia);
            $mult_value = Arr::add($mult_value, 'pb', $value->pb * $prodleitedia);
            $mult_value = Arr::add($mult_value, 'ca', $value->ca * $prodleitedia);
            $mult_value = Arr::add($mult_value, 'p', $value->p * $prodleitedia);
        }

        return $mult_value;
    }

    /**
     * Undocumented function
     *
     * @param [type] $em_lactacao
     * @param [type] $peso_vivo
     * @return void
     */
    private function nutrientes_manutencao($em_lactacao, $peso_vivo)
    {
        $perc_exigido = DB::table('en')
            ->where('em_lactacao', '=', $em_lactacao)
            ->where('peso_vivo', '=', $peso_vivo)
            ->get();

        $mult_value = [];
        foreach ($perc_exigido as &$value) {
            $mult_value = Arr::add($mult_value, 'iden', $value->iden);
            $mult_value = Arr::add($mult_value, 'peso_vivo', $value->peso_vivo);
            $mult_value = Arr::add($mult_value, 'em', $value->em);
            $mult_value = Arr::add($mult_value, 'ndt', $value->ndt);
            $mult_value = Arr::add($mult_value, 'pb', $value->pb);
            $mult_value = Arr::add($mult_value, 'ca', $value->ca);
            $mult_value = Arr::add($mult_value, 'p', $value->p);
            $mult_value = Arr::add($mult_value, 'em_lactacao', $value->em_lactacao);
        }

        return $mult_value;
    }

    /**
     * Calcular o consumo total de matéria seca
     *
     * @param Request $request
     * @return void
     */
    private function calcular_consumo_ms($peso_vivo, $prodleitedia)
    {

        $prodleitedia = ($prodleitedia > 0) ? $prodleitedia : 10;
        $perc_exigido = DB::table('mspl')
            ->where('peso_vivo', '=', $peso_vivo)
            ->where('producao_leite', '=', $prodleitedia)
            ->get();
        return (count($perc_exigido) > 0) ? ($peso_vivo * $perc_exigido[0]->percentual_peso_vivo) / 100 : 0;
    }

    private function arred_pesovivo($peso_vivo)
    {
        $resto = $peso_vivo % 100;
        if ($resto > 0 && $resto < 50) {
            $peso_vivo -= $resto;
            $peso_vivo += 50;
        } elseif ($resto > 50 && $resto < 100) {
            $peso_vivo -= $resto;
            $peso_vivo += 100;
        }
        return $peso_vivo;
    }
}
