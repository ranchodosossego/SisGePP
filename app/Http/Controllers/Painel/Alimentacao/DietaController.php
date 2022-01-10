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

        #region Validação
        $validator = Validator::make($request->all(), [
            'volumoso_ids' => ['required'],
            'concentrado_energetico_ids' => ['required'],
            'concentrado_proteico_ids' => ['required'],
            'peso_vivo' => ['required'],
            'prodleitedia' => ['required'],
            'perc_gordura' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag()->getMessages(),
            ]);
        }

        $dados = $this->get_param($request);

        #endregion

        #region Exigência Nutricional para Mantença e Produção

        //--: Nutrientes necessários para a MANUTENÇÃO DA VIDA
        $arrnutrientes = $this->nutrientes_manutencao($dados[0]['em_lactacao'], $dados[0]['peso_vivo']);

        //--: Nutrientes necessários para a PRODUÇÃO DESEJADA DE LEITE
        $arrnut_prod_leite = ($dados[0]['prodleitedia'] > 0) ? $this->nutrientes_producaoleite($dados[0]['perc_gordura'], $dados[0]['prodleitedia']) : null;

        //--: EXIGÊNCIA NUTRICIONAL MANUTENÇAO + PRODUÇÃO DE LEITE
        $en = $this->exigencia_nutricional_final($arrnutrientes, $arrnut_prod_leite, $dados);

        #endregion

        #region Dados Nutricionais dos Ingredientes que serão usados: Volumoso e Concentrado

        $nut_volumosos = $this->get_nutriente_alimento($dados[0]['volumoso_ids'], 1);
        $nut_concentrado_energetico = $this->get_nutriente_alimento($dados[0]['concentrado_energetico_ids'], 2);
        $nut_concentrado_proteico = $this->get_nutriente_alimento($dados[0]['concentrado_proteico_ids'], 2);

        #endregion

        #region Totais de NDT E PB usados no VOLUMOSO E CONCENTRADO

        //--: % de NDT e PB em relação a MS que o ANIMAL necessita por dia
        $tot_ndt_animal_perc = round((($en[0]['ndt'] / $en[0]['ms_dia']) * 100), 2);
        $tot_pb_animal_perc = round((($en[0]['pb'] / $en[0]['ms_dia']) * 100), 2);

        if (is_null($arrnut_prod_leite)) {
            $dados_volumoso = $this->get_volumoso($en, 0, $nut_volumosos);
        }

        if (!is_null($arrnut_prod_leite)) {
            $dados_concentrado =$this->get_concentrado($dados);
            $dados_volumoso = $this->get_volumoso($en, 0, $nut_volumosos);
        }



        //--: OS CONCENTRADOS TEM 88% DE MATÉRIA SECA (Kg)
        //--: TOTAL DE CONCENTRADO A SER OFERTADO (3Kg Concentrado => 1Kg de leite produzido)
        //*** SUPLEMENTO tem que ser descontado na matéria seca do concentrado
        // $tot_concentrado = (is_null($arrnut_prod_leite)) ? 0  : round($dados[0]['prodleitedia'] / 3, 3);
        // $tot_ms_concentrado_kg = round(88 * $tot_concentrado / 100, 3);
        //$tot_ms_volumoso_kg = round($en[0]['ms_dia'] - $tot_ms_concentrado_kg, 3);

        //--: CALCULAR Kg DE NDT e PB DO VOLUMOSO
        //$tot_ndt_volumoso_kg = round(($nut_volumosos[0]['ndt'] * $tot_ms_volumoso_kg / 100), 2);
        //$tot_pb_volumoso_kg = round(($nut_volumosos[0]['pb'] * $tot_ms_volumoso_kg / 100), 3);

        //--: CALCULAR Kg DE NDT e PB DO CONCENTRADO
        $en_ndt_concentrado_kg = round((abs($dados_volumoso['ndt_volumoso_kg'] - ((float)$en[0]['ndt']))), 2);
        $en_pb_concentrado_kg = round((abs($dados_volumoso['pb_volumoso_kg'] - ((float)$en[0]['pb']))), 3);

        //--: Valor de PREMIX - Precisa ser cadastrado na base
        $premix = 0.367;  //0.367 valor do nucleo para teste

        //--: % Percentual de NDT e PB que o CONCENTRADO deve ter
        // $en_ndt_concentrado = round(($en_ndt_concentrado_kg / ($tot_ms_concentrado_kg - $premix)) * 100, 2);
        // $en_pb_concentrado = round(($en_pb_concentrado_kg / ($tot_ms_concentrado_kg - $premix)) * 100, 2);
        //--------------

        // $ndts_mistura = $this->get_mistura($nut_concentrado_energetico, $nut_concentrado_proteico, $en_pb_concentrado, $en_ndt_concentrado);
        // $mistura_algebrico = $this->get_mistura_algebrico($nut_concentrado_energetico, $nut_concentrado_proteico, $en_ndt_concentrado, $en_pb_concentrado);


        // $tot_ms_mistura_kg = round(($tot_ms_concentrado_kg * $ndts_mistura['tot_ndt_mistura_perc'] / 100), 3);


        //--: Kg de MS de cada um dos ingredientes
        // $tot_ms_energetico_mistura = round(($tot_ms_mistura_kg * $ndts_mistura['perc_energetico'] / 100), 3);
        // $tot_ms_proteico_mistura = round(($tot_ms_mistura_kg * $ndts_mistura['perc_proteico'] / 100), 3);

        #endregion

        return response()->json([
            'status' => 200,
            'peso_vivo' => $dados,
        ]);
    }

    /**
     * Calcula as quantidades, em Kg, de: Matéria Seca, NDT e PB.
     *
     * @param [array] $en
     * @param [type] $ms_concentrado
     * @param [array] $nut_volumosos
     * @return void
     */
    private function get_volumoso($en, $ms_concentrado, $nut_volumosos)
    {
        $ms_volumoso_kg = round($en[0]['ms_dia'] - $ms_concentrado, 3);

        //--: CALCULAR Kg DE NDT e PB DO VOLUMOSO
        $ndt_volumoso_kg = round(($nut_volumosos[0]['ndt'] * $ms_volumoso_kg / 100), 2);
        $pb_volumoso_kg = round(($nut_volumosos[0]['pb'] * $ms_volumoso_kg / 100), 3);

        $mult_values = [];
        $mult_value = [];
        $mult_value = Arr::add($mult_value, 'ms_kg', $ms_volumoso_kg);
        $mult_value = Arr::add($mult_value, 'ndt_kg', $ndt_volumoso_kg);
        $mult_value = Arr::add($mult_value, 'pb_kg', $pb_volumoso_kg);
        $mult_values = Arr::prepend($mult_values, $mult_value);
        return $mult_values;
    }

    private function get_concentrado($dados)
    {
        $tot_concentrado = round($dados[0]['prodleitedia'] / 3, 3);
        $ms_concentrado_kg = round(88 * $tot_concentrado / 100, 3);

        // //--: CALCULAR Kg DE NDT e PB DO CONCENTRADO
        // $en_ndt_concentrado_kg = round((abs($tot_ndt_volumoso_kg - ((float)$en[0]['ndt']))), 2);
        // $en_pb_concentrado_kg = round((abs($tot_pb_volumoso_kg - ((float)$en[0]['pb']))), 3);

        $mult_values = [];
        $mult_value = [];
        $mult_value = Arr::add($mult_value, 'ms_concentrado_kg', $ms_concentrado_kg);

        // $mult_value = Arr::add($mult_value, 'concentrado_energetico_ids', $request->input('concentrado_energetico_ids'));
        // $mult_value = Arr::add($mult_value, 'concentrado_proteico_ids', $request->input('concentrado_proteico_ids'));
        // $mult_value = Arr::add($mult_value, 'peso_vivo',  $this->arred_pesovivo($request->input('peso_vivo')));
        // $mult_value = Arr::add($mult_value, 'perc_gordura', $request->input('perc_gordura'));
        // $mult_value = Arr::add($mult_value, 'prodleitedia', $request->input('prodleitedia'));
        // $mult_value = Arr::add($mult_value, 'em_lactacao', (($request->input('prodleitedia') > 0) ? 1 : 0));
        $mult_values = Arr::prepend($mult_values, $mult_value);
        return $mult_values;
    }



    private function get_mistura_algebrico($ings_energetico, $ings_proteico, $en_ndt_concentrado, $en_pb_concentrado)
    {
        $ingrediente1_pb = $ings_energetico[0]['pb'];
        $ingrediente2_pb = $ings_proteico[0]['pb'];
        $perc = round(((($en_ndt_concentrado * 100) - ($ingrediente1_pb * 100)) / ($ingrediente2_pb - $ingrediente1_pb)), 2);
        $mult_value = [];
        // $mult_value = Arr::add($mult_value, 'tot_ndt_mistura_perc', $ndt_energetico + $ndt_proteico);
        // $mult_value = Arr::add($mult_value, 'perc_energetico', $perc_energetico);
        // $mult_value = Arr::add($mult_value, 'perc_proteico', $perc_proteico);

        return $mult_value;
    }

    /**
     * Obtém a Mistura através do Quadrado de Pearson
     *
     * @param [type] $nut_concentrado
     * @param [type] $tot_ndt_concentrado_perc
     * @param [type] $tot_pb_concentrado_perc
     * @return void
     */
    private function get_mistura($nut_concentrado, $nut_concentrado_proteico, $tot_pb_concentrado_perc, $tot_ndt_concentrado_perc)
    {


        //--: Quadrado de Pearson: a diferença é feita cruzada entre o item energético e proteíco.
        $parte_energetica = abs($tot_pb_concentrado_perc - $nut_concentrado_proteico[0]['pb']);
        $parte_proteica = abs($tot_pb_concentrado_perc - $nut_concentrado[0]['pb']);
        $tot_partes = $parte_energetica + $parte_proteica;

        $perc_energetico = round(($parte_energetica / $tot_partes) * 100, 2);
        $perc_proteico = round(($parte_proteica / $tot_partes) * 100, 2);

        $ndt_energetico = round(($perc_energetico * $nut_concentrado[0]['ndt'] / 100), 2);
        $ndt_proteico = round(($perc_proteico * $nut_concentrado_proteico[0]['ndt'] / 100), 2);

        $mult_value = [];
        $mult_value = Arr::add($mult_value, 'tot_ndt_mistura_perc', $ndt_energetico + $ndt_proteico);
        $mult_value = Arr::add($mult_value, 'perc_energetico', $perc_energetico);
        $mult_value = Arr::add($mult_value, 'perc_proteico', $perc_proteico);

        return $mult_value;
    }

    /**
     * Monta um array com todas entradas do usuário
     *
     * @param [type] $request
     * @return void
     */
    private function get_param($request)
    {
        $mult_values = [];
        $mult_value = [];
        $mult_value = Arr::add($mult_value, 'volumoso_ids', $request->input('volumoso_ids'));
        $mult_value = Arr::add($mult_value, 'concentrado_energetico_ids', $request->input('concentrado_energetico_ids'));
        $mult_value = Arr::add($mult_value, 'concentrado_proteico_ids', $request->input('concentrado_proteico_ids'));
        $mult_value = Arr::add($mult_value, 'peso_vivo',  $this->arred_pesovivo($request->input('peso_vivo')));
        $mult_value = Arr::add($mult_value, 'perc_gordura', $request->input('perc_gordura'));
        $mult_value = Arr::add($mult_value, 'prodleitedia', $request->input('prodleitedia'));
        $mult_value = Arr::add($mult_value, 'em_lactacao', (($request->input('prodleitedia') > 0) ? 1 : 0));
        $mult_values = Arr::prepend($mult_values, $mult_value);
        return $mult_values;
    }

    /**
     * Undocumented function
     *
     * @param [type] $alimento_ids
     * @param [type] $classealimento
     * @return void
     */
    private function get_nutriente_alimento($alimento_ids, $classealimento)
    {
        $lstnutrientesalimentos = DB::table('alimento')
            ->whereIn('idalimento', $alimento_ids)
            ->where('ativo', '=', 1)
            ->where('classe_alimento_idclasse_alimento', '=', $classealimento)
            ->select('idalimento', 'nome', 'ms', 'ndt', 'pb', 'ca', 'p')
            ->get();
        return $this->monta_exigencia_nutricional($lstnutrientesalimentos, 1, true);
    }

    /**
     * Undocumented function
     *
     * @param [type] $en_minima
     * @param [type] $en_producao_leite
     * @return void
     */
    private function exigencia_nutricional_final($en_minima, $en_producao_leite, $dados)
    {
        $mult_value = [];
        $mult_values = [];
        $ms_dia = (float)$this->calcular_consumo_ms($dados[0]['peso_vivo'], $dados[0]['prodleitedia']);
        if (is_null($en_producao_leite)) {
            $mult_value = Arr::add($mult_value, 'ms_dia', $ms_dia);
            $mult_value = Arr::add($mult_value, 'ndt', $en_minima[0]['ndt']);
            $mult_value = Arr::add($mult_value, 'pb', $en_minima[0]['pb']);
            $mult_value = Arr::add($mult_value, 'ca', $en_minima[0]['ca']);
            $mult_value = Arr::add($mult_value, 'p', $en_minima[0]['p']);
            $mult_values = Arr::prepend($mult_values, $mult_value);
        } else {
            $mult_value = Arr::add($mult_value, 'ms_dia', $ms_dia);
            $mult_value = Arr::add($mult_value, 'ndt', $en_minima[0]['ndt'] + $en_producao_leite[0]['ndt']);
            $mult_value = Arr::add($mult_value, 'pb', $en_minima[0]['pb'] + $en_producao_leite[0]['pb']);
            $mult_value = Arr::add($mult_value, 'ca', $en_minima[0]['ca'] + $en_producao_leite[0]['ca']);
            $mult_value = Arr::add($mult_value, 'p', $en_minima[0]['p'] + $en_producao_leite[0]['p']);
            $mult_values = Arr::prepend($mult_values, $mult_value);
        }
        return $mult_values;
    }

    private function nutrientes_producaoleite($perc_gordura, $prodleitedia)
    {
        $producaoleite = DB::table('enpl')
            ->where('gordura', '=', $perc_gordura)
            ->get();

        return $this->monta_exigencia_nutricional($producaoleite, $prodleitedia, false);
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
        return $this->monta_exigencia_nutricional($perc_exigido, 1, false);
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
        return (count($perc_exigido) > 0) ? ($peso_vivo * $perc_exigido[0]->percentual_peso_vivo) / 100 : 1;
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

    /**
     * Undocumented function
     *
     * @param [type] $obj
     * @param [type] $multplicador
     * @param [type] $bln_ms
     * @return void
     */
    private function monta_exigencia_nutricional($obj, $multplicador, $bln_ms)
    {
        $mult_values = [];
        $mult_value = [];
        foreach ($obj as &$value) {
            if ($bln_ms) {
                $mult_value = Arr::add($mult_value, 'idalimento', $value->idalimento);
                $mult_value = Arr::add($mult_value, 'nome', $value->nome);
                $mult_value = Arr::add($mult_value, 'ms', $value->ms);
            }
            $mult_value = Arr::add($mult_value, 'ndt', $value->ndt * $multplicador);
            $mult_value = Arr::add($mult_value, 'pb', $value->pb * $multplicador);
            $mult_value = Arr::add($mult_value, 'ca', $value->ca * $multplicador);
            $mult_value = Arr::add($mult_value, 'p', $value->p * $multplicador);
            $mult_values = Arr::prepend($mult_values, $mult_value);
            $mult_value = [];
        }

        return $mult_values;
    }
}
