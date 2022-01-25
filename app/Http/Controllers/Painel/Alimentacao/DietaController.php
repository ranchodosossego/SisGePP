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
        //phpinfo();
        $lstalimento = DB::table('alimento')
            ->where('alimento.ativo', '=', '1')
            ->orderBy('nome', 'asc')
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
            //'perc_gordura' => ['required'],
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

            // if (is_null($dados[0]['concentrado_energetico_ids'])) {
            //     $validator = Validator::make($request->all(), [
            //         'concentrado_proteico_ids' => ['required'],
            //     ]);
            //     if ($validator->fails()) {
            //         return response()->json([
            //             'status' => 400,
            //             'errors' => $validator->getMessageBag()->getMessages(),
            //         ]);
            //     }
            //     $ing_concentrado_proteico = $this->get_nutriente_alimento($dados[0]['concentrado_proteico_ids'], 2);
            // } else {
            //     $validator = Validator::make($request->all(), [
            //         'concentrado_energetico_ids' => ['required'],
            //     ]);
            //     if ($validator->fails()) {
            //         return response()->json([
            //             'status' => 400,
            //             'errors' => $validator->getMessageBag()->getMessages(),
            //         ]);
            //     }
            //     $ing_concentrado_energetico = $this->get_nutriente_alimento($dados[0]['concentrado_energetico_ids'], 2);
            // }
            $validator = Validator::make($request->all(), [
                'nucleo' => ['required'],
                //'perc_gordura' => ['required'],
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'errors' => $validator->getMessageBag()->getMessages(),
                ]);
            }
        }

        #endregion

        #region Variáveis Locais

        //-- Novos
        $en_producao_leite = null;
        $nucleo_perc = [];
        $en_mantenca = [];
        $en_total = [];

        //--: Setter de variáveis
        $dados = $this->get_param($request);
        $dados_nucleo = [];
        $dados_volu = [];
        $dados_conc = [];
        $dados_gerais = [];
        $dados_grid = [];

        $nucleo_perc = (float)($dados[0]['nucleo']);

        //--------------------------------
        #endregion

        #region Nova lógica
        $en_mantenca = $this->get_en_mantenca($dados[0]['em_lactacao'], $dados[0]['peso_vivo']);
        $en_producao_leite = $this->get_en_producao_leite($dados[0]['perc_gordura'], $dados[0]['prodleitedia']);
        $en_total = $this->get_en_total($dados, $en_mantenca, $en_producao_leite);

        $dados_nucleo = $this->get_dados_nucleo($dados, $nucleo_perc);
        $dados_volu = $this->get_dados_volumoso($dados, $en_total);
        $dados_conc = $this->get_dados_concentrado($dados, $dados_volu, $dados_nucleo, $en_total);


        $ing_mist = $this->monta_misturas($dados, $dados_conc);
        $dados_grid = $this->get_mistura($ing_mist, $dados_conc, $dados_volu, $dados_nucleo);

        #endregion

        $dados_gerais = $this->show_dados_tela($dados_nucleo, $dados_volu, $dados_conc);

        return response()->json([
            'status' => 200,
            'dados_gerais' => $dados_gerais,
            'dados_grid' => $dados_grid,
        ]);
    }

    private function show_dados_tela($dados_nucleo, $dados_volu, $dados_conc)
    {
        $volumoso = [];
        $concentrado = [];
        $nucleo = [];
        $mistura = [];

        $tot_mist_kg = 0;
        $tot_mist_perc = 0;
        $ing = [];
        $grid_ing = [];
        $geral = [];

        $tot_mist_kg = round($dados_volu["mn_kg"] + $dados_nucleo["nucleo_mn_kg"] + $dados_conc["mn_kg"], 3);

        $volumoso = array(
            'id' => 1,
            'nome' => 'TOTAL DE VOLUMOSO',
            'kg' => $dados_volu['mn_kg'],
            'perc' => $dados_volu['mn_perc'],
        );
        $concentrado = array(
            'id' => 2,
            'nome' => 'TOTAL DE CONCENTRADO',
            'kg' => $dados_conc["mn_kg"],
            'perc' => $dados_conc["mn_perc"],
        );
        $nucleo = array(
            'id' => 3,
            'nome' => 'TOTAL DE NÚCLEO',
            'kg' => $dados_nucleo["nucleo_mn_kg"],
            'perc' => $dados_nucleo["nucleo_mns_perc"],
        );
        $mistura = array(
            'id' => 4,
            'nome' => 'TOTAL DA MISTURA',
            'kg' => $tot_mist_kg,
            'perc' => 100,
        );
        array_push($geral, $volumoso, $concentrado, $nucleo, $mistura);

        return $geral;
    }

    private function monta_misturas($dados, $dados_conc)
    {
        $result = [];

        if ($dados[0]["em_lactacao"]) {

            $ing_conc_energ = $this->get_alimento($dados[0]['concentrado_energetico_ids'], 2);
            $ing_conc_prot = $this->get_alimento($dados[0]['concentrado_proteico_ids'], 2);

            //-- Ordena o array por NDT, descrecente.
            $result = (array)array_merge($ing_conc_energ, $ing_conc_prot);
            $col = array_column($result, "pb");
            array_multisort($col, SORT_DESC, $result);
            $tot_ingredientes = count($result);
            $eh_impar = ($tot_ingredientes % 2 == 1);
            $menor = 0;
            $maior = 0;
            for ($i = 0; $i < $tot_ingredientes; $i++) {
                if ($result[$i]["pb"] >= $dados_conc["pb_perc"]) {
                    $maior++;
                } else {
                    $menor++;
                }
            }

            if ($eh_impar) {
                if ($maior < $menor) {
                    $firstKey = $result[0];
                    array_unshift($result, $firstKey);
                }
                if ($maior > $menor) {
                    $lastKey = $result[$tot_ingredientes - 1];
                    array_push($result, $lastKey);
                }
            }
        }
        return $result;
    }

    private function calc_quadrado_pearson_ing($id_mist, $ing1, $ing2, $pb)
    {
        $mistura = [];

        //--: Variáveis do Quadrado de Pearson
        $p1 = abs($ing2['pb'] - $pb);
        $p2 = abs($ing1['pb'] - $pb);
        $tp = round($p1 + $p2, 2);

        $ing1['perc_mist'] = round($p1 / $tp * 100, 2);
        $ing2['perc_mist'] = round($p2 / $tp * 100, 2);

        $ing1['ndt_perc'] = round($ing1['perc_mist'] * $ing1['ndt'] / 100, 2);
        $ing2['ndt_perc'] = round($ing2['perc_mist'] * $ing2['ndt'] / 100, 2);

        $mistura = array(
            'nome' => 'Mistura-' . $id_mist,
            'ingrediente-1' => $ing1,
            'ingrediente-2' => $ing2,
            'tot_ndt_mist_perc' => round($ing1['ndt_perc'] + $ing2['ndt_perc'], 2),
            'ing1_perc' => $ing1['perc_mist'],
            'ing1_ndt_perc' =>  $ing1['ndt_perc'],
            'ing2_perc' => $ing2['perc_mist'],
            'ing2_ndt_perc' =>  $ing2['ndt_perc'],
        );

        return $mistura;
    }

    private function calc_quadrado_pearson_mist($misturas, $dados_conc, $dados_nucleo)
    {

            /////// CORRIGIR PAR DOIS ITENS



        //--: Variáveis do Quadrado de Pearson
        $a = $misturas[1]["tot_ndt_mist_perc"];
        $b = $misturas[0]["tot_ndt_mist_perc"];

        $p1 = round(abs($a - $dados_conc['ndt_perc']), 2);
        $p2 = round(abs($b - $dados_conc['ndt_perc']), 2);
        $tp = round($p1 + $p2, 2);

        //-- Misturas: % da Mistura e Kg de MS
        $misturas[0]['perc_mist'] = round($p1 / $tp * 100, 2);
        $misturas[0]['mist_ms_kg'] =  round($dados_conc["conc_ms_sem_nucleo_kg"] * $misturas[0]['perc_mist'] / 100, 3);
        $misturas[1]['perc_mist'] = round($p2 / $tp * 100, 2);
        $misturas[1]['mist_ms_kg'] =  round($dados_conc["conc_ms_sem_nucleo_kg"] * $misturas[1]['perc_mist'] / 100, 3);

        //-- Ingredientes: Kg de MS
        foreach ($misturas as &$item) {
            foreach ($item as $key => &$value) {
                if (is_array($value)) {

                    // if (array_key_exists("primeiro", $busca_array)) {
                    //     echo "O elemento 'primeiro' está no array!";
                    // }


                    $ms_kg = round($item['mist_ms_kg'] * $value["ndt_perc"] / 100, 3);
                    $ms_perc = round($ms_kg * 100 / $dados_conc['ms_kg'], 2);
                    $mn_kg = round($dados_conc["mn_kg"] * $ms_kg  / $dados_conc['ms_kg'], 3);
                    $mn_perc = round($mn_kg * 100 / $dados_conc["mn_kg"], 2);
                    $value['ms_perc'] = $ms_perc;
                    $value['ms_kg'] = $ms_kg;
                    $value['mn_perc'] = $mn_perc;
                    $value['mn_kg'] = $mn_kg;
                }
            }

            $item['tot_mn_conc_perc'] = $dados_conc["mn_perc"];
            $item['tot_mn_conc_kg'] = $dados_conc["mn_kg"];
        }

        return $misturas;
    }
    private function get_mistura($ing_mist, $dados_conc, $dados_volu, $dados_nucleo)
    {
        $itens = [];
        $result = [];
        $mist = [];
        $misturas = [];
        $tot_mist = 0;

        //-- Volumoso
        if (!empty($dados_volu)) {
            $itens['idalimento'] = $dados_volu["idalimento"];
            $itens['nome'] = $dados_volu["nome"];
            $itens['categoria'] = 'Volumoso';
            $itens['perc'] = $dados_volu["mn_perc"];
            $itens['kg'] = $dados_volu["mn_kg"];
            $itens['classe'] = $dados_volu["classe"];
            $itens['subclasse'] = $dados_volu["subclasse"];
            array_push($result, $itens);
        }

        //-- Núcleo
        if ($dados_nucleo["nucleo_mns_perc"] > 0) {
            $itens['idalimento'] = 0;
            $itens['nome'] = 'Premix';
            $itens['categoria'] = 'Núcleo';
            $itens['perc'] = $dados_nucleo["nucleo_mns_perc"];
            $itens['kg'] = $dados_nucleo["nucleo_mn_kg"];
            $itens['classe'] = 8;
            $itens['subclasse'] = 5;
            array_push($result, $itens);
        }

        //-- Concentrado
        if (!empty($ing_mist)) {

            #region Misturas - Quadrado Pearson Ingredientes
            $tot_ing = count($ing_mist) - 1;
            $tot_mist = count($ing_mist) / 2;
            $id_mist = 1;
            for ($i = 0; $i < $tot_mist; $i++) {

                $ing1 = $ing_mist[$i];
                $ing2 = $ing_mist[$tot_ing - $i];

                $mist = $this->calc_quadrado_pearson_ing(
                    $id_mist,
                    $ing1,
                    $ing2,
                    $dados_conc['pb_perc'],
                    $dados_nucleo,
                );
                array_push($misturas, $mist);
                $id_mist++;
            }
            //-- end_for

            #endregion
            $mist = [];
            $mist = $this->calc_quadrado_pearson_mist($misturas, $dados_conc, $dados_nucleo);
            foreach ($mist as $key => &$item) {
                foreach ($item as &$value) {
                    if (is_array($value)) {
                        $ing = array(
                            'idalimento' => $value['idalimento'],
                            'nome' => $value['nome'],
                            'categoria' => 'Concentrado',
                            'perc' => round($value['mn_perc'], 2),
                            'kg' => round($value['mn_kg'], 3),
                            'classe' => $value['classe'],
                            'subclasse' => $value['subclasse'],

                        );
                        array_push($result, $ing);
                    }
                }
            }
        }

        $idx_duplicado = [];
        for ($i = 0; $i < count($result); $i++) {
            for ($j = $i + 1; $j < count($result); $j++) {
                if ($result[$i]['idalimento'] === $result[$j]['idalimento']) {
                    $perc = round($result[$i]['perc'] + $result[$j]['perc'], 2);
                    $kg = round($result[$i]['kg'] + $result[$j]['kg'], 2);
                    $result[$i]['perc'] = $perc;
                    $result[$i]['kg'] = $kg;
                    $idx_duplicado = $j;
                }
            }
        }

        if(!empty($idx_duplicado)) {
            unset($result[$idx_duplicado]);
        }

        return $result;
    }

    /**
     * Calcula a MS do Concentrado considerando o premix. Caso a
     * produção de leite seja zero (vaca seca) todos os valores dos
     * índices virão zerados. Caso contrário, o cálculo considerando
     * para produzir 3 Kg de leite é necessário 1 Kg de concentrado
     * será feito. O premix será calculado e descontado da mistura,
     * a não ser que seja usado zero % de núcleo.
     *
     * @param [type] $dados
     * @param [type] $premix
     * @return Retorna 0 para Produção de Leite 0.
     */
    private function get_ms_mn_concentrado($dados)
    {
        $mn_kg = round($dados[0]['prodleitedia'] / 3, 3);
        $ms_kg = round(88 * $mn_kg / 100, 3);
        $result['mn_kg'] = $mn_kg;
        $result['ms_kg'] = $ms_kg;

        return $result;
    }

    /**
     * Undocumented function
     *
     * @param [type] $dados
     * @param [type] $dados_volumoso
     * @param [type] $en
     * @return void
     */
    private function get_dados_concentrado($dados, $dados_volu, $dados_nucleo, $en_total)
    {
        $ms_defict_kg = 0;
        $conc_ms_sem_nucleo_kg = 0;
        $ms_kg = 0;
        $mn_kg = 0;
        $mn_perc = 0;
        $ndt_kg = 0;
        $ndt_perc = 0;
        $pb_kg = 0;
        $pb_perc = 0;
        $tot_mn_perc = 0;
        $usa_concentrado = ($dados[0]['prodleitedia'] > 0);

        if ($usa_concentrado) {

            $materias_conc = $this->get_ms_mn_concentrado($dados); // Retorn 0 para Producao Leite zero
            $ms_kg = $materias_conc['ms_kg'];
            $mn_kg = $materias_conc['mn_kg'];

            $conc_ms_sem_nucleo_kg = $dados_nucleo["conc_ms_sem_nucleo_kg"];
            $ms_defict_kg = $ms_kg - $dados_nucleo["nucleo_ms_kg"];
            $ndt_kg = round(abs($dados_volu['ndt_kg'] - (float)$en_total["ndt_kg"]), 2);
            $pb_kg = round(abs($dados_volu['pb_kg'] - (float)$en_total["pb_kg"]), 3);

            //--: %  de NDT e PB que o CONCENTRADO deve ter.
            $ndt_perc = round($ndt_kg / $ms_defict_kg * 100, 2);
            $pb_perc = round($pb_kg / $ms_defict_kg * 100, 2);
            $mn_perc = round($materias_conc['ms_kg'] / (float)$en_total["ms_kg_dia"] * 100, 2);
        }

        $result['ms_kg'] = $ms_kg;
        $result['conc_ms_sem_nucleo_kg'] = $conc_ms_sem_nucleo_kg;
        $result['ndt_kg'] = $ndt_kg;
        $result['ndt_perc'] = $ndt_perc;
        $result['pb_kg'] = $pb_kg;
        $result['pb_perc'] = $pb_perc;
        $result['mn_perc'] = $mn_perc;
        $result['mn_kg'] = $mn_kg;

        return $result;
    }

    /**
     * Calcula as quantidades, em Kg, de: Matéria Seca, NDT e PB.
     *
     * @param [array] $en
     * @param [type] $ms_concentrado
     * @param [array] $ing_volumosos
     * @return void
     */
    private function get_dados_volumoso($dados, $en_total)
    {
        $materias_conc = [];
        $ing_volumoso = [];
        $ms_volumoso_kg = 0;
        $ndt_volumoso_kg = 0;
        $pb_volumoso_kg = 0;
        $mn_kg = 0;
        $mn_perc = 0;

        $materias_conc = $this->get_ms_mn_concentrado($dados);

        $ing_volumoso = $this->get_alimento($dados[0]['volumoso_ids'], 1);
        $ms_volumoso_kg = round($en_total['ms_kg_dia'] - $materias_conc['ms_kg'], 3);
        $mn_kg = round(($ms_volumoso_kg / $ing_volumoso[0]['ms']) * 100, 3);

        //--: CALCULAR Kg DE NDT e PB DO VOLUMOSO
        $ndt_volumoso_kg = round(($ing_volumoso[0]['ndt'] * $ms_volumoso_kg / 100), 2);
        $pb_volumoso_kg = round(($ing_volumoso[0]['pb'] * $ms_volumoso_kg / 100), 3);
        $mn_perc = round(($ms_volumoso_kg / $en_total['ms_kg_dia']) * 100, 2);

        $result['idalimento'] = $ing_volumoso[0]['idalimento'];
        $result['nome'] = $ing_volumoso[0]['nome'];
        $result['ms_kg'] = $ms_volumoso_kg;
        $result['ndt_kg'] = $ndt_volumoso_kg;
        $result['pb_kg'] = $pb_volumoso_kg;
        $result['mn_perc'] = $mn_perc;
        $result['mn_kg'] = $mn_kg;
        $result['classe'] = $ing_volumoso[0]['classe'];
        $result['subclasse'] = $ing_volumoso[0]['subclasse'];
        return $result;
    }

    /**
     * Undocumented function
     *
     * @param [type] $dados
     * @param [type] $premix_perc
     * @return void
     */
    private function get_dados_nucleo($dados, $premix_perc)
    {
        $nucleo = [];
        $nucleo_ms_kg = 0;
        $nucleo_mn_kg = 0;
        $nucleo_perc = 0;
        $ms_kg = 0;
        $mn_kg = 0;
        $conc_ms_sem_nucleo_kg = 0;
        $materia = [];
        $materias_conc = [];

        if ($dados[0]["em_lactacao"]) {
            $materias_conc = $this->get_ms_mn_concentrado($dados);
            $ms_kg = (float)$materias_conc['ms_kg'];
            $mn_kg = (float)$materias_conc['mn_kg'];
        } else {
            $materia = $this->get_consumo_ms($dados[0]['peso_vivo'], $dados[0]['prodleitedia']);
            $ms_kg = $mn_kg = (float)$materia['ms_kg_dia'];
        }

        if ($premix_perc > 0) {
            $nucleo_perc = $premix_perc;
            $nucleo_ms_kg = round($nucleo_perc * $ms_kg / 100, 3);
            $nucleo_mn_kg = round($mn_kg * $nucleo_ms_kg / $ms_kg, 3);
            $conc_ms_sem_nucleo_kg = abs($ms_kg - $nucleo_ms_kg);
        } else {
            // Dependendo do fabricante será 30g para 100Kg peso vivo:
            // round($dados[0]['peso_vivo'] * 0.3, 3).
            // $nucleo_ms_kg = $nucleo_mn_kg = round($dados[0]['peso_vivo'] * 0.3, 3);
            // $nucleo_perc = (0.3 * 100);
            // $conc_ms_sem_nucleo_kg = $nucleo_ms_kg;
            $nucleo_ms_kg = 0;
            $nucleo_perc = 0;
            $conc_ms_sem_nucleo_kg = 0;
        }

        // Retorno
        $nucleo['tot_conc_mn_kg'] = $mn_kg;
        $nucleo['tot_conc_ms_kg'] = $ms_kg;

        $nucleo['nucleo_mn_kg'] = $nucleo_mn_kg;
        $nucleo['nucleo_ms_kg'] = $nucleo_ms_kg;
        $nucleo['nucleo_mns_perc'] = $nucleo_perc;
        $nucleo['conc_ms_sem_nucleo_kg'] = $conc_ms_sem_nucleo_kg;

        return $nucleo;
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
        $mult_value = Arr::add($mult_value, 'em_lactacao', (($request->input('prodleitedia') > 0) ?? 1));
        $mult_value = Arr::add($mult_value, 'nucleo', $request->input('nucleo'));

        $mult_values = Arr::prepend($mult_values, $mult_value);
        return $mult_values;
    }

    private function get_en_total($dados, $en_mantenca, $en_producao_leite)
    {

        $materia = [];
        $ms_kg_dia = 0;
        $soma_ndt = 0;
        $soma_pb = 0;
        $soma_ca = 0;
        $soma_p = 0;

        $ndt_kg = 0;
        $ndt_perc = 0;
        $pb_perc = 0;
        $pb_kg = 0;
        $ca_kg = 0;
        $p_kg = 0;


        $materia = $this->get_consumo_ms($dados[0]['peso_vivo'], $dados[0]['prodleitedia']);
        $ms_kg_dia = $materia['ms_kg_dia'];

        if (!empty($en_producao_leite)) {
            $soma_ndt = $en_mantenca[0]['ndt'] + $en_producao_leite[0]['ndt'];
            $soma_pb = $en_mantenca[0]['pb'] + $en_producao_leite[0]['pb'];
            $soma_ca = $en_mantenca[0]['ca'] + $en_producao_leite[0]['ca'];
            $soma_p = $en_mantenca[0]['p'] + $en_producao_leite[0]['p'];

            $ndt_perc = round($soma_ndt / $ms_kg_dia * 100, 2);
            $pb_perc = round($soma_pb / $ms_kg_dia * 100, 2);
            $ndt_kg = $soma_ndt;
            $pb_kg = $soma_pb;
            $ca_kg = $soma_ca;
            $p_kg = $soma_p;
        }
        if (empty($en_producao_leite)) {

            $ndt_perc = round($en_mantenca[0]['ndt'] / $ms_kg_dia * 100, 2);
            $pb_perc = round($en_mantenca[0]['pb'] / $ms_kg_dia * 100, 2);
            $ndt_kg = $en_mantenca[0]['ndt'];
            $pb_kg = $en_mantenca[0]['pb'];
            $ca_kg = $en_mantenca[0]['ca'];
            $p_kg = $en_mantenca[0]['p'];
        }

        $result['ms_kg_dia'] = $ms_kg_dia;
        $result['ndt_kg'] = $ndt_kg;
        $result['ndt_perc'] = $ndt_perc;
        $result['pb_kg'] = $pb_kg;
        $result['pb_perc'] = $pb_perc;
        $result['ca_kg'] = $ca_kg;
        $result['p_kg'] = $p_kg;

        return $result;
    }

    private function get_en_producao_leite($perc_gordura, $prodleitedia)
    {
        $producaoleite = DB::table('enpl')
            ->where('gordura', '=', $perc_gordura)
            ->get();

        return $this->monta_exigencia_nutricional($producaoleite, $prodleitedia, false);
    }

    /**
     * Retorna as Exigências Nutricionais considerando o peso
     * e se a vaca está em lactação.
     *
     * @param [tiny] $em_lactacao: 0 || 1
     * @param [int] $peso_vivo: peso da vaca
     * @return Array com dados padronizados dos nutrientes.
     */
    private function get_en_mantenca($em_lactacao, $peso_vivo)
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
     * @return array
     */
    private function get_consumo_ms($peso_vivo, $prodleitedia)
    {
        $perc_exigido = DB::table('mspl')
            ->where('peso_vivo', '=', $peso_vivo)
            ->where('producao_leite', '=', $prodleitedia)
            ->get();

        $result['ms_kg_dia'] = $peso_vivo * $perc_exigido[0]->percentual_peso_vivo / 100;
        $result['ms_perc_dia'] = $perc_exigido[0]->percentual_peso_vivo;

        return $result;
    }

    /**
     * Undocumented function
     *
     * @param [type] $alimento_ids
     * @param [type] $classealimento
     * @return void
     */
    private function get_alimento($alimento_ids, $classealimento)
    {
        $alimentos = DB::table('alimento')
            ->whereIn('idalimento', $alimento_ids)
            ->where('ativo', '=', 1)
            ->where('classe_alimento_idclasse_alimento', '=', $classealimento)
            ->select('idalimento', 'nome', 'ms', 'ndt', 'pb', 'ca', 'p', 'classe_alimento_idclasse_alimento', 'subclasse_idsubclasse')
            ->get();
        return $this->monta_exigencia_nutricional($alimentos, 1, true);
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

        if (is_null($obj)) {
            $mult_value = Arr::add($mult_value, 'idalimento', 0);
            $mult_value = Arr::add($mult_value, 'nome', '');
            $mult_value = Arr::add($mult_value, 'ms', 0);
            $mult_value = Arr::add($mult_value, 'ndt', 0);
            $mult_value = Arr::add($mult_value, 'pb', 0);
            $mult_value = Arr::add($mult_value, 'ca', 0);
            $mult_value = Arr::add($mult_value, 'p', 0);
            $mult_value = Arr::add($mult_value, 'classe', 0);
            $mult_value = Arr::add($mult_value, 'subclasse', 0);
            $mult_values = Arr::prepend($mult_values, $mult_value);
        } else {

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
        }
        return $mult_values;
    }
}
