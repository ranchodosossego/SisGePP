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

        #region Validação e Inicialização de Variáveis
        $validator = Validator::make($request->all(), [
            'volumoso_ids' => ['required'],
            'prodleitedia' => ['required'],
            'peso_vivo' => ['required'],
            'perc_gordura' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag()->getMessages(),
            ]);
        }

        $dados = $this->get_param($request);

        if ($dados[0]['prodleitedia'] > 0) {


            if (is_null($dados[0]['concentrado_energetico_ids']) && is_null($dados[0]['concentrado_proteico_ids'])) {
                // $validator = Validator::make($request->all(), [
                //     'concentrado_energetico_ids' => ['required'],
                //     'concentrado_proteico_ids' => ['required'],
                // ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => 400,
                        'errors' => $validator->getMessageBag()->getMessages(),
                    ]);
                }
            }

            if (is_null($dados[0]['concentrado_energetico_ids'])) {
                $validator = Validator::make($request->all(), [
                    'concentrado_proteico_ids' => ['required'],
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => 400,
                        'errors' => $validator->getMessageBag()->getMessages(),
                    ]);
                }
                $ing_concentrado_proteico = $this->get_nutriente_alimento($dados[0]['concentrado_proteico_ids'], 2);
            } else {
                $validator = Validator::make($request->all(), [
                    'concentrado_energetico_ids' => ['required'],
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'status' => 400,
                        'errors' => $validator->getMessageBag()->getMessages(),
                    ]);
                }
                $ing_concentrado_energetico = $this->get_nutriente_alimento($dados[0]['concentrado_energetico_ids'], 2);
            }
            $validator = Validator::make($request->all(), [
                'nucleo' => ['required'],
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'errors' => $validator->getMessageBag()->getMessages(),
                ]);
            }
        }

        #endregion

        $dados = $this->get_param($request);
        $dados_volumoso = [];
        $dados_concentrado = [];
        $en_minima = [];
        $en_producao_leite = [];
        $en = [];

        $ing_volumosos = [];
        $ing_concentrado_energetico = [];
        $ing_concentrado_proteico = [];
        $mistura_algebrico = [];
        $ms_concentrado_kg = 0;
        $misturas = [];
        $grid_ing = [];
        $tot_dieta_kg = 0;

        #region Exigência Nutricional para Mantença e Produção

        //--: Nutrientes necessários para a MANUTENÇÃO DA VIDA
        $en_minima = $this->nutrientes_manutencao($dados[0]['em_lactacao'], $dados[0]['peso_vivo']);

        //--: Nutrientes necessários para a PRODUÇÃO DESEJADA DE LEITE
        $en_producao_leite = ($dados[0]['prodleitedia'] > 0) ? $this->nutrientes_producaoleite($dados[0]['perc_gordura'], $dados[0]['prodleitedia']) : null;

        //--: EXIGÊNCIA NUTRICIONAL MANUTENÇAO + PRODUÇÃO DE LEITE
        $en = $this->exigencia_nutricional_final($en_minima, $en_producao_leite, $dados);

        #endregion

        #region Dados Nutricionais dos Ingredientes que serão usados: Premix, Volumoso e Concentrado
        $ing_volumosos = $this->get_nutriente_alimento($dados[0]['volumoso_ids'], 1);

        if ($dados[0]['prodleitedia'] > 0) {
            $ing_concentrado_energetico = $this->get_nutriente_alimento($dados[0]['concentrado_energetico_ids'], 2);
            $ing_concentrado_proteico = $this->get_nutriente_alimento($dados[0]['concentrado_proteico_ids'], 2);
        }

        //--: Valor de PREMIX - Precisa ser cadastrado na base
        $premix = (float)($dados[0]['nucleo']);

        #endregion

        #region Totais de NDT E PB de VOLUMOSO E CONCENTRADO
        if (is_null($en_producao_leite)) {
            $ms_concentrado_kg = 0;
            $dados_volumoso = $this->get_volumoso($en, 0, $ing_volumosos);
            $dados_concentrado = [];
            $tot_dieta_kg = $dados_volumoso[0]['tot_mn_kg'];
            //$misturas = $this->get_mistura_por_ndt($ing_concentrado_energetico, $ing_concentrado_proteico, $dados_concentrado);
        }

        if (!is_null($en_producao_leite)) {
            $ms_concentrado_kg = $this->get_ms_concentrado($dados);
            $dados_volumoso = $this->get_volumoso($en, $ms_concentrado_kg, $ing_volumosos);
            $dados_concentrado = $this->get_concentrado($dados, $dados_volumoso, $en, $premix);
            $misturas = $this->get_mistura_por_ndt($ing_concentrado_energetico, $ing_concentrado_proteico, $dados_concentrado, $dados_volumoso);
        }

        $grid_ing = $this->get_dados_grid($ing_volumosos, $dados_volumoso, $dados_concentrado, $misturas);


        //$a = $dados_volumoso[0]["tot_volumoso_dieta_perc"] + $dados_concentrado[0]["tot_concentrado_dieta_perc"];
        #endregion

        return response()->json([
            'status' => 200,
            'dados_volumoso' => $dados_volumoso,
            'dados_concentrado' => $dados_concentrado,
            'misturas' => $misturas,
            'grid_ing' => $grid_ing,
        ]);
    }

    private function get_dados_grid($ing_volumosos, $dados_volumoso, $dados_concentrado, $misturas)
    {
        $ing = [];
        $grid_ing = [];

        $ing = array(
            'nome' => $ing_volumosos[0]['nome'],
            'categoria' => 'Volumoso',
            'perc' => $dados_volumoso[0]['tot_mn_perc'],
            'kg' => $dados_volumoso[0]['tot_mn_kg'],
            'classe' => $ing_volumosos[0]['classe'],
            'subclasse' => $ing_volumosos[0]['subclasse'],
        );
        array_push($grid_ing, $ing);

        if (empty($misturas)) {
            return $grid_ing;
        }

        $ing = array(
            'nome' => 'Premix',
            'categoria' => 'Núcleo',
            'perc' => $dados_concentrado[0]["premix_perc"],
            'kg' => $misturas[0]['premix_mn_kg'],
            'classe' => 8,
            'subclasse' => 5,
        );
        array_push($grid_ing, $ing);

        foreach ($misturas as &$item) {
            foreach ($item as &$value) {
                if (is_array($value)) {
                    $ing = array(
                        'nome' => $value['nome'],
                        'categoria' => 'Concentrado',
                        'perc' => round($value['ms_perc'], 2),
                        'kg' => round($value['mn_kg'], 3),
                        'classe' => $value['classe'],
                        'subclasse' => $value['subclasse'],

                    );
                    array_push($grid_ing, $ing);
                }
            }
        }

        return $grid_ing;
    }

    private function get_mistura_por_ndt($ing_concentrado_energetico, $ing_concentrado_proteico, $dados_concentrado, $dados_volumoso)
    {
        $mistura = [];
        $ing_misturas = [];
        $tot_partes_mistura = 0;
        $tot_dieta_kg = $dados_volumoso[0]['tot_mn_kg'] + $dados_concentrado[0]['tot_mn_kg'];

        $result = array_merge($ing_concentrado_energetico, $ing_concentrado_proteico);
        $tot_ingredientes = count($result);
        $eh_par = ($tot_ingredientes % 2 == 0);

        //-- Ordenando por NDT
        $col = array_column($result, "ndt");
        array_multisort($col, SORT_DESC, $result);

        #region //-- Calculando NDT e PB dos Ingredientes
        if ($eh_par) {
            $z = 1;
            for ($i = 0; $i < $tot_ingredientes; $i += 2) {
                if ($i >= $tot_ingredientes) {
                    break;
                } else {

                    //--: Variáveis do Quadrado de Pearson
                    $ing1_partes = abs(($dados_concentrado[0]['pb_perc'] - $result[$i + 1]['pb']));
                    $ing2_partes = abs(($dados_concentrado[0]['pb_perc'] - $result[$i]['pb']));
                    $tot_partes_mistura = round($ing1_partes + $ing2_partes, 2);
                    $ing1_perc = round(($ing1_partes / $tot_partes_mistura) * 100, 2);
                    $ing2_perc = round(($ing2_partes / $tot_partes_mistura) * 100, 2);

                    $ing1_ndt_perc = round(($ing1_perc * $result[$i]['ndt']) / 100, 2);
                    $ing2_ndt_perc = round(($ing2_perc * $result[$i + 1]['ndt']) / 100, 2);
                    $tot_ndt_mistura_perc = round($ing1_ndt_perc + $ing2_ndt_perc, 2);


                    $result[$i]['ing_perc'] = $ing1_perc;
                    $result[$i + 1]['ing_perc'] = $ing2_perc;

                    $mistura = array(
                        //array(
                        'nome' => 'Mistura-' . $z++,
                        'tot_ndt_mistura_perc' => $tot_ndt_mistura_perc,
                        'ingrediente-1' => $result[$i],
                        'ing1_perc' => $ing1_perc,
                        'ing1_ndt_perc' => $ing1_ndt_perc,
                        'ingrediente-2' => $result[$i + 1],
                        'ing2_perc' => $ing2_perc,
                        'ing2_ndt_perc' => $ing2_ndt_perc,
                        // ),
                    );
                    array_push($ing_misturas, $mistura);
                }
            }
            //-- end_for
            if (count($ing_misturas) == 1) {
                $a = $ing_misturas[0];
            }
            if (count($ing_misturas) == 2) {
                $mist1_partes = abs(($dados_concentrado[0]['ndt_perc'] - $ing_misturas[1]['tot_ndt_mistura_perc']));
                $mist2_partes = abs(($dados_concentrado[0]['ndt_perc'] - $ing_misturas[0]['tot_ndt_mistura_perc']));
                $tot_partes_misturas = round($mist1_partes + $mist2_partes, 2);
                $tot_mist1_perc = round(($mist1_partes / $tot_partes_misturas) * 100, 2);
                $tot_mist2_perc = round(($mist2_partes / $tot_partes_misturas) * 100, 2);

                //-- Mistura-1
                $ms_mist1_kg = round(($dados_concentrado[0]['ms_sem_premix_kg'] * $tot_mist1_perc) / 100, 3);

                //-- Ingrediente 1
                $mist1_ing1_ms_kg = round($ms_mist1_kg * $ing_misturas[0]['ing1_perc'] / 100, 3);
                $mist1_ing1_ms_perc = round($mist1_ing1_ms_kg * 100 / $dados_concentrado[0]['ms_kg'], 2);
                $ing_misturas[0]['ingrediente-1']['ms_kg'] = $mist1_ing1_ms_kg;
                $ing_misturas[0]['ingrediente-1']['ms_perc'] = $mist1_ing1_ms_perc;
                // $ing_misturas[0]['ing1_ms_kg'] = $mist1_ing1_ms_kg;
                // $ing_misturas[0]['ing1_ms_perc'] = $mist1_ing1_ms_perc;

                //-- Ingrediente 2
                $mist1_ing2_ms_kg = round($ms_mist1_kg * $ing_misturas[0]['ing2_perc'] / 100, 3);
                $mist1_ing2_ms_perc = round(($mist1_ing2_ms_kg / $dados_concentrado[0]['ms_kg']) * 100, 2);
                $ing_misturas[0]['ingrediente-2']['ms_kg'] = $mist1_ing2_ms_kg;
                $ing_misturas[0]['ingrediente-2']['ms_perc'] = $mist1_ing2_ms_perc;

                // $ing_misturas[0]['ing2_ms_kg'] = $mist1_ing2_ms_kg;
                // $ing_misturas[0]['ing2_ms_perc'] = $mist1_ing2_ms_perc;
                //-- end_mistura1

                //-- Mistura-2
                $ms_mist2_kg = round(($dados_concentrado[0]['ms_sem_premix_kg'] * $tot_mist2_perc) / 100, 3);

                //-- Ingrediente 1
                $mist2_ing1_ms_kg = round($ms_mist2_kg * $ing_misturas[1]['ing1_perc'] / 100, 3);
                $mist2_ing1_ms_perc = round($mist2_ing1_ms_kg * 100 / $dados_concentrado[0]['ms_kg'], 2);
                $ing_misturas[1]['ingrediente-1']['ms_kg'] = $mist2_ing1_ms_kg;
                $ing_misturas[1]['ingrediente-1']['ms_perc'] = $mist2_ing1_ms_perc;
                // $ing_misturas[1]['ing1_ms_kg'] = $mist2_ing1_ms_kg;
                // $ing_misturas[1]['ing1_ms_perc'] = $mist2_ing1_ms_perc;

                //-- Ingrediente 2
                $mist2_ing2_ms_kg = round($ms_mist2_kg * $ing_misturas[1]['ing2_perc'] / 100, 3);
                $mist2_ing2_ms_perc = round($mist2_ing2_ms_kg * 100 / $dados_concentrado[0]['ms_kg'], 2);
                $ing_misturas[1]['ingrediente-2']['ms_kg'] = $mist2_ing2_ms_kg;
                $ing_misturas[1]['ingrediente-2']['ms_perc'] = $mist2_ing2_ms_perc;
                // $ing_misturas[1]['ing2_ms_kg'] = $mist2_ing2_ms_kg;
                // $ing_misturas[1]['ing2_ms_perc'] = $mist2_ing2_ms_perc;

                //$tot_dieta_kg = $dados_concentrado[0]['ms_kg'];
                //$ing_misturas['premix_mn_kg'] = round(($tot_dieta_kg * 5) / 100, 3);
                $a = round($dados_concentrado[0]['tot_mn_kg'] * $dados_concentrado[0]['premix_kg'] / $dados_concentrado[0]['ms_kg'], 3);
                $ing_misturas[0]['ingrediente-1']['mn_kg'] = round($dados_concentrado[0]['tot_mn_kg'] * $mist1_ing1_ms_kg / $dados_concentrado[0]['ms_kg'], 3);
                $ing_misturas[0]['ingrediente-2']['mn_kg'] = round($dados_concentrado[0]['tot_mn_kg'] * $mist1_ing2_ms_kg / $dados_concentrado[0]['ms_kg'], 3);
                $ing_misturas[0]['premix_mn_kg'] = round($dados_concentrado[0]['tot_mn_kg'] * $dados_concentrado[0]['premix_kg'] / $dados_concentrado[0]['ms_kg'], 3);

                $ing_misturas[1]['premix_mn_kg'] = round($dados_concentrado[0]['tot_mn_kg'] * $dados_concentrado[0]['premix_kg'] / $dados_concentrado[0]['ms_kg'], 3);
                $ing_misturas[1]['ingrediente-1']['mn_kg'] = round($dados_concentrado[0]['tot_mn_kg'] * $mist2_ing1_ms_kg / $dados_concentrado[0]['ms_kg'], 3);
                $ing_misturas[1]['ingrediente-2']['mn_kg'] = round($dados_concentrado[0]['tot_mn_kg'] * $mist2_ing2_ms_kg / $dados_concentrado[0]['ms_kg'], 3);
            }
        }
        #endregion

        return $ing_misturas;
    }

    private function get_mistura_por_pb($ing_concentrado_energetico, $ing_concentrado_proteico)
    {
        $mistura = [];
        $ing_misturas = [];

        $result = array_merge($ing_concentrado_energetico, $ing_concentrado_proteico);
        $tot_ingredientes = count($result);
        $eh_par = ($tot_ingredientes % 2 == 0);

        //-- Ordenando por PB
        $col = array_column($result, "pb");
        array_multisort($col, SORT_ASC, $result);

        //-- Criando array de misturas para PB
        if ($eh_par) {
            $tot_misturas = $tot_ingredientes / 2;
            for ($i = 0; $i < $tot_misturas; $i++) {
                $mistura = array(
                    array('nome' => 'Mistura-' . $i + 1, 'ingrediente-1' => $result[$i], 'ingrediente-2' => $result[$tot_ingredientes - 1 - $i]),
                );
                array_push($ing_misturas, $mistura);
            }
        }

        return $ing_misturas;
    }

    /**
     * Obtém a Mistura através do Quadrado de Pearson
     *
     * @param [type] $nut_concentrado
     * @param [type] $tot_ndt_concentrado_perc
     * @param [type] $tot_pb_concentrado_perc
     * @return void
     */
    private function get_mistura($nut_concentrado, $ing_concentrado_proteico, $tot_pb_concentrado_perc, $tot_ndt_concentrado_perc)
    {

        //--: Quadrado de Pearson: a diferença é feita cruzada entre o item energético e proteíco.
        $parte_energetica = abs($tot_pb_concentrado_perc - $ing_concentrado_proteico[0]['pb']);
        $parte_proteica = abs($tot_pb_concentrado_perc - $nut_concentrado[0]['pb']);
        $tot_partes = $parte_energetica + $parte_proteica;

        $perc_energetico = round(($parte_energetica / $tot_partes) * 100, 2);
        $perc_proteico = round(($parte_proteica / $tot_partes) * 100, 2);

        $ndt_energetico = round(($perc_energetico * $nut_concentrado[0]['ndt'] / 100), 2);
        $ndt_proteico = round(($perc_proteico * $ing_concentrado_proteico[0]['ndt'] / 100), 2);

        $mult_value = [];
        $mult_value = Arr::add($mult_value, 'tot_ndt_mistura_perc', $ndt_energetico + $ndt_proteico);
        $mult_value = Arr::add($mult_value, 'perc_energetico', $perc_energetico);
        $mult_value = Arr::add($mult_value, 'perc_proteico', $perc_proteico);

        return $mult_value;
    }

    /**
     * Undocumented function
     *
     * @param [type] $dados
     * @param [type] $dados_volumoso
     * @param [type] $en
     * @return void
     */
    private function get_concentrado($dados, $dados_volumoso, $en, $premix)
    {
        $tot_mn_kg = round($dados[0]['prodleitedia'] / 3, 3);
        $ms_kg = round(88 * $tot_mn_kg / 100, 3);
        $premix_kg = round($premix * $ms_kg / 100, 3);
        $ms_sem_premix_kg = $ms_kg - $premix_kg;

        //--: Kg de NDT e PB que o CONCENTRADO deve ter
        $ndt_kg = round((abs($dados_volumoso[0]['ndt_kg'] - ((float)$en[0]['ndt_kg']))), 2);
        $pb_kg = round((abs($dados_volumoso[0]['pb_kg'] - ((float)$en[0]['pb_kg']))), 3);

        //--: %  de NDT e PB que o CONCENTRADO deve ter.
        $ndt_perc = round(($ndt_kg / ($ms_kg - $premix_kg)) * 100, 2);
        $pb_perc = round(($pb_kg / ($ms_kg - $premix_kg)) * 100, 2);

        $tot_mn_perc = round(($ms_kg / $en[0]['ms_kg_dia']) * 100, 2);

        $mult_values = [];
        $mult_value = [];
        $mult_value = Arr::add($mult_value, 'ms_kg', $ms_kg);
        $mult_value = Arr::add($mult_value, 'ms_sem_premix_kg', $ms_sem_premix_kg);
        $mult_value = Arr::add($mult_value, 'ndt_kg', $ndt_kg);
        $mult_value = Arr::add($mult_value, 'ndt_perc', $ndt_perc);
        $mult_value = Arr::add($mult_value, 'pb_kg', $pb_kg);
        $mult_value = Arr::add($mult_value, 'pb_perc', $pb_perc);
        $mult_value = Arr::add($mult_value, 'tot_mn_perc', $tot_mn_perc);
        $mult_value = Arr::add($mult_value, 'tot_mn_kg', $tot_mn_kg);

        $mult_value = Arr::add($mult_value, 'premix_kg', $premix_kg);
        $mult_value = Arr::add($mult_value, 'premix_perc', $premix);

        $mult_values = Arr::prepend($mult_values, $mult_value);
        return $mult_values;
    }

    /**
     * Calcula as quantidades, em Kg, de: Matéria Seca, NDT e PB.
     *
     * @param [array] $en
     * @param [type] $ms_concentrado
     * @param [array] $ing_volumosos
     * @return void
     */
    private function get_volumoso($en, $ms_concentrado, $ing_volumosos)
    {
        $ms_volumoso_kg = round($en[0]['ms_kg_dia'] - $ms_concentrado, 3);
        $tot_mn_kg =  round(($ms_volumoso_kg / $ing_volumosos[0]['ms']) * 100, 3);

        //--: CALCULAR Kg DE NDT e PB DO VOLUMOSO
        $ndt_volumoso_kg = round(($ing_volumosos[0]['ndt'] * $ms_volumoso_kg / 100), 2);
        $pb_volumoso_kg = round(($ing_volumosos[0]['pb'] * $ms_volumoso_kg / 100), 3);
        $tot_mn_perc = round(($ms_volumoso_kg / $en[0]['ms_kg_dia']) * 100, 2);

        $mult_values = [];
        $mult_value = [];
        $mult_value = Arr::add($mult_value, 'ms_kg', $ms_volumoso_kg);
        $mult_value = Arr::add($mult_value, 'ndt_kg', $ndt_volumoso_kg);
        $mult_value = Arr::add($mult_value, 'pb_kg', $pb_volumoso_kg);
        $mult_value = Arr::add($mult_value, 'tot_mn_perc', $tot_mn_perc);
        $mult_value = Arr::add($mult_value, 'tot_mn_kg', $tot_mn_kg);

        $mult_values = Arr::prepend($mult_values, $mult_value);
        return $mult_values;
    }

    private function get_ms_concentrado($dados)
    {
        return round(88 * (round($dados[0]['prodleitedia'] / 3, 3)) / 100, 3);
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
        $mult_value = Arr::add($mult_value, 'nucleo', $request->input('nucleo'));

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
            ->select('idalimento', 'nome', 'ms', 'ndt', 'pb', 'ca', 'p', 'classe_alimento_idclasse_alimento', 'subclasse_idsubclasse')
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
        $ndt_perc = 0;
        $pb_perc = 0;
        $ms_kg_dia = (float)$this->calcular_consumo_ms($dados[0]['peso_vivo'], $dados[0]['prodleitedia']);

        if (is_null($en_producao_leite)) {
            $ndt_perc = round((($en_minima[0]['ndt'] / $ms_kg_dia) * 100), 2);
            $pb_perc = round((($en_minima[0]['pb'] / $ms_kg_dia) * 100), 2);

            $mult_value = Arr::add($mult_value, 'ms_kg_dia', $ms_kg_dia);
            $mult_value = Arr::add($mult_value, 'ndt_kg', $en_minima[0]['ndt']);
            $mult_value = Arr::add($mult_value, 'ndt_perc', $ndt_perc);
            $mult_value = Arr::add($mult_value, 'pb_kg', $en_minima[0]['pb']);
            $mult_value = Arr::add($mult_value, 'pb_perc', $pb_perc);
            $mult_value = Arr::add($mult_value, 'ca_kg', $en_minima[0]['ca']);
            $mult_value = Arr::add($mult_value, 'p_kg', $en_minima[0]['p']);
            $mult_values = Arr::prepend($mult_values, $mult_value);
        }

        if (!is_null($en_producao_leite)) {
            $ndt_perc = round(((($en_minima[0]['ndt'] + $en_producao_leite[0]['ndt']) / $ms_kg_dia) * 100), 2);
            $pb_perc = round(((($en_minima[0]['pb'] + $en_producao_leite[0]['pb']) / $ms_kg_dia) * 100), 2);

            $mult_value = Arr::add($mult_value, 'ms_kg_dia', $ms_kg_dia);
            $mult_value = Arr::add($mult_value, 'ndt_kg', $en_minima[0]['ndt'] + $en_producao_leite[0]['ndt']);
            $mult_value = Arr::add($mult_value, 'ndt_perc', $ndt_perc);
            $mult_value = Arr::add($mult_value, 'pb_kg', $en_minima[0]['pb'] + $en_producao_leite[0]['pb']);
            $mult_value = Arr::add($mult_value, 'pb_perc', $pb_perc);
            $mult_value = Arr::add($mult_value, 'ca_kg', $en_minima[0]['ca'] + $en_producao_leite[0]['ca']);
            $mult_value = Arr::add($mult_value, 'p_kg', $en_minima[0]['p'] + $en_producao_leite[0]['p']);
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
        $perc_producao = 1.8;
        if ($prodleitedia > 0) {
            $perc_exigido = DB::table('mspl')
                ->where('peso_vivo', '=', $peso_vivo)
                ->where('producao_leite', '=', $prodleitedia)
                ->get();
            $perc_producao = $perc_exigido[0]->percentual_peso_vivo;
        }
        $perc_exigido = ($peso_vivo * $perc_producao) / 100;
        return $perc_exigido;
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

            $mult_value =  (isset($value->classe_alimento_idclasse_alimento))
                ? Arr::add($mult_value, 'classe', $value->classe_alimento_idclasse_alimento)
                : Arr::add($mult_value, 'classe', 0);

            if (isset($value->classe_alimento_idclasse_alimento)) {
                $mult_value = Arr::add($mult_value, 'classe', $value->classe_alimento_idclasse_alimento);
                $mult_value = Arr::add($mult_value, 'subclasse', $value->subclasse_idsubclasse);
            }

            if (!isset($value->classe_alimento_idclasse_alimento)) {
                $mult_value = Arr::add($mult_value, 'classe', 0);
                $mult_value = Arr::add($mult_value, 'subclasse', 0);
            }

            //subclasse_idsubclasse

            $mult_values = Arr::prepend($mult_values, $mult_value);
            $mult_value = [];
        }

        return $mult_values;
    }
}
