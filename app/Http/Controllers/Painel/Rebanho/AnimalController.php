<?php

namespace App\Http\Controllers\Painel\Rebanho;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;

use Yajra\DataTables\DataTables;
use Intervention\Image\Facades\Image;

use App\Models\Raca;
use App\Models\Animal;
use App\Models\Origem;
use App\Models\Usuario;

class AnimalController extends Controller
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
        $lstraca = Raca::where('ativo', '=', '1')->get()->sortBy('nome');
        $lstorigem = Origem::get()->sortByDesc('nome');
        return view('painel.rebanho.animal', compact('lstraca', 'lstorigem'));
    }

    public function getLotesAnimal()
    {
        $lstanimal = DB::table('animal')
            ->join('lote', 'animal.lote_idlote', '=', 'lote.idlote')
            ->join('tipo_lote', 'tipo_lote.idtipo_lote', '=', 'lote.tipo_lote_idtipo_lote')
            ->where('animal.ativo', '=', '1')
            ->get();

        return response()->json([
            'status' => 200,
            'message' => 'Alteração de lote realizado com sucesso!',
            'objeto' => $lstanimal,
        ]);
    }

    /**
     * Atualiza o lote em que o animal se encontra no momento.
     *
     * @param Request $request
     * @return Mensagem com status
     */
    public function updateLoteAnimal(Request $request)
    {
        $idanimal = $request->get('idanimal');
        $idtipo_lote = $request->get('idtipo_lote');


        try {

            $lote = DB::table('lote')
                ->where('lote.tipo_lote_idtipo_lote', '=', $idtipo_lote)
                ->get();

            $animal = DB::table('animal')
                ->where('animal.idanimal', $idanimal)
                ->update(['animal.lote_idlote' => $lote[0]->idlote]);

            $oanimal = DB::table('animal')
                ->where('animal.idanimal', $idanimal)
                ->get();


            return response()->json([
                'status' => 200,
                'message' => 'Alteração de lote realizado com sucesso!',
                'objeto' => $oanimal,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 503,
                'message' => $e->getMessage(), //'Não foi possível cadastrar esse novo animal. Tente novamente.' //$e->getMessage()
                'objeto' => null,
            ]);
        }
    }

    public function obtemAnimal($id)
    {
        $animal = DB::table('animal')
            ->join('lote', 'animal.lote_idlote', '=', 'lote.idlote')
            ->join('tipo_lote', 'tipo_lote.idtipo_lote', '=', 'lote.tipo_lote_idtipo_lote')
            ->where('animal.ativo', '=', '1')
            ->where('animal.idanimal', '=', $id)
            ->select([
                'animal.idanimal', 'animal.numero_brinco', 'animal.nome', 'animal.dias_vida', 'animal.apelido',
                'tipo_lote.nome  as tnome', 'animal.observacao', 'animal.peso_entrada', 'animal.data_nascimento',
                'animal.apelido', 'animal.foto', 'tipo_lote.idtipo_lote'
            ])
            ->get();
        return $animal;
    }

    public function getAnimal(Request $request)
    {
        $id = $request->get('idanimal');
        $animal = $this->obtemAnimal($id);
        return response()->json([
            'data' => $animal,
        ]);
    }

    private function getAcoes($lstanimal)
    {
        $path = '';

        //$path = URL::to('/getfichatecnica') . '/' . $lstanimal['idanimal'];
        $path = '/getfichatecnica' . '/' . $lstanimal['idanimal'];

        $result = '<div class="btn-group">' .
            '<button type="button" class="btn btn-light btn-sm dropdown-toggle acoes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ações <span class="fas fa-ellipsis-v fa-sm pl-2"></span></button>' .
            '<ul class="dropdown-menu bg-light">' .
            '<li><a href="#" onclick="deletar(\'' . $lstanimal['idanimal'] . '\');" class="btn btn-outline-default" data-tooltip="Remover a ' . $lstanimal['nome'] . '"><i class="fas fa-trash fa-sm"></i> Excluir</a></li>' .
            '<li><a href="#" data-toggle="modal" data-id="' . $lstanimal['idanimal'] . '"  data-target="#modal-atualizar" class="btn btn-outline-default open-modal" data-tooltip="Atualizar a ' . $lstanimal['nome'] . '"><i class="fas fa-sync-alt fa-sm"></i> Atualizar Avatar</a></li>' .
            '<li role="separator" class="divider"></li>' .
            '<li><a target="" href="' . $path . '" data-id="' . $lstanimal['idanimal'] . '#panel-default" class="btn btn-outline-default breadcrumb-item prontuario" data-tooltip="Abrir o Prontuário da ' . $lstanimal['nome'] . '"><i class="fas fa-paste fa-sm"></i> Ficha Técnica</a></li>' .
            '</ul>' .
            '</div>';

        return $result;
    }

    public function getAnimalList()
    {
        $lsta = [];
        $lstanimal = [];
        $lsta = DB::table('animal')
            ->join('lote', 'animal.lote_idlote', '=', 'lote.idlote')
            ->join('tipo_lote', 'tipo_lote.idtipo_lote', '=', 'lote.tipo_lote_idtipo_lote')
            ->where('animal.ativo', '=', '1')
            ->select(['animal.idanimal', 'animal.numero_brinco', 'animal.nome', 'animal.data_nascimento', 'animal.apelido', 'tipo_lote.nome  as tnome'])
            ->get();

        $lstanimal = $this->order_list_animal_lote($lsta);

        return DataTables::of($lstanimal)
            ->addColumn("numero_brinco", function ($lstanimal) {
                return Str::padLeft((string)$lstanimal["numero_brinco"], 5, '0');
            })
            ->addColumn('action', function ($lstanimal) {
                return '<button onclick="msgs(\'' . $lstanimal["idanimal"] . '\');" class="btn btn-outline-success btn-sm col-8 me-0">' . $lstanimal["nome"] . '</button>';
            })
            ->addColumn('actions', function ($lstanimal) {
                $butoes = $this->getAcoes($lstanimal);
                // $butoes = '<div class="btn-group btn-group-sm">' .
                //     '<a href="#" onclick="deletar(\'' . $lstanimal->idanimal . '\');" class="btn btn-outline-danger" data-tooltip="Remover a ' . $lstanimal->nome . '"><i class="fas fa-trash"></i></a>' .
                //     '<a href="#" data-toggle="modal" data-id="' . $lstanimal->idanimal . '"  data-target="#modal-atualizar" class="btn btn-outline-secondary open-modal" data-tooltip="Atualizar a ' . $lstanimal->nome . '"><i class="fas fa-camera"></i>' .
                //     '</div>';
                return $butoes;
            })
            ->rawColumns(['action', 'actions'])
            ->make(true);
    }

    private function order_list_animal_lote($obj)
    {
        $itens = [];
        $result = [];
        $dv = 0;

        foreach ($obj as $item) {
            $dv = Carbon::createFromDate(Carbon::createFromFormat('d/m/Y', $item->data_nascimento)->format('d-m-Y'))->diffInDays(Carbon::now());
            $itens["idanimal"] = $item->idanimal;
            $itens["numero_brinco"] = $item->numero_brinco;
            $itens["nome"] = $item->nome;
            $itens["dias_vida"] = $dv;
            $itens["apelido"] = $item->apelido;
            $itens["tnome"] = $item->tnome;

            array_push($result, $itens);
        }

        return $result;
    }

    /**
     * Cria um novo animal
     *
     * @param Request $request
     * @return void Json
     */
    public function create(Request $request)
    {

        // Validação
        $validator = Validator::make($request->all(), [

            // Campos obrigatórios
            'numero_brinco' => ['required', 'string', 'max:15'],
            'nome' => ['required', 'string', 'max:25'],
            'genero' => 'required',
            'dias_vida' => 'required|integer|min:1|max:10000',
            'data_entrada' => 'required',
            'data_nascimento' => 'required',
            'data_nescimento_estimado' => 'required',
            'peso_entrada' => 'required|integer|min:1|max:1000',

            // Foreign Keys
            'grau_sangue_idgrau_sangue' => 'required',
            'raca_idraca' => 'required',
            'origem_idorigem' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag()->getMessages(),
            ]);
        } else {

            //Propriedade ID e Facha Etaria ID
            $fxetaria = $this->classificacao_etaria($request->input('dias_vida'));
            $propid = Usuario::find(auth()->user()->id)->propriedade_idpropriedade;

            //Verifica se o brinco pertence a outro animal
            $animal = $this->animal_brinco($request->input('numero_brinco'));

            if ($animal) {
                return response()->json([
                    'status' => 100,
                    'message' => 'Este Animal já foi cadastrado.'
                ]);
            }

            // Campos obrigatórios
            $animal = new Animal;
            $animal->nome = $request->input('nome');
            $animal->genero = $request->input('genero');
            $animal->dias_vida = $request->input('dias_vida');
            $animal->numero_brinco = $request->input('numero_brinco');

            $animal->peso_entrada = $request->input('peso_entrada');
            $animal->apelido = $request->input('apelido');
            $animal->foto = $request->input('foto');
            $animal->numero_sisbov = $request->input('numero_sisbov');
            $animal->observacao = $request->input('observacao');
            $animal->rgd = $request->input('rgd');
            $animal->rgn = $request->input('rgn');
            $animal->data_entrada = $request->input('data_entrada');
            $animal->data_nascimento = $request->input('data_nascimento');
            $animal->data_nascimento_estimado = ($request->input('data_nescimento_estimado') == 'true' ? 1 : 0);

            $animal->ativo = 1;

            // Foreign Keys
            $animal->propriedade_idpropriedade = $propid;
            $animal->grau_sangue_idgrau_sangue = $request->input('grau_sangue_idgrau_sangue');
            $animal->origem_idorigem = $request->input('origem_idorigem');
            $animal->lote_idlote = 1;

            try {
                $animal->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'Novo Animal salvo com sucesso.'
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 503,
                    'message' => 'Não foi possível cadastrar esse novo animal. Tente novamente.' //$e->getMessage()
                ]);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'image' => 'mimes:png,jpg,jpeg|max:2048',
            'animalid' => 'required',
            'nome' => 'required',
        ]);

        $image = $request->file('image');
        $imgnome = 'RSGL-' . $request->animalid . '-' . $request->nome . '.' . $image->extension();
        $filePath = public_path('assets/img/animal/thumbs');
        $img = Image::make($image->path());
        $img->resize(200, 200, function ($const) {
            $const->aspectRatio();
        })->save($filePath . '/' . $imgnome);
        $save_path = 'assets/img/animal/thumbs/' . $imgnome;

        try {

            DB::table('animal')
                ->where('idanimal', $request->animalid)
                ->update(['foto' => $save_path]);

            return response()->json([
                'status' => 200,
                'message' => 'Imagem atualizada com sucesso.',
                'url' => $save_path,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 503,
                'message' => 'Não foi possível atualizar a foto desse animal. Tente novamente.' //$e->getMessage()
            ]);
        }
    }

    /**
     * Consulta a faixa etária em que o animal se encontra atualmente
     *
     * @param [type] $diasvida
     * @return Array Classificação Etária
     */
    private function classificacao_etaria($diasvida)
    {
        $fxetaria = DB::select(DB::raw("SELECT idclassificacao_etaria FROM classificacao_etaria WHERE :diasvida BETWEEN dia_inicial AND dia_final"), array(
            'diasvida' => $diasvida,
        ));
        return ($fxetaria);
    }

    private function animal_brinco($numbrinco)
    {
        //Verifica se o brinco pertence a outro animal
        $animal = DB::select(DB::raw("SELECT * FROM animal WHERE numero_brinco = :numbrinco AND ativo = :ativo"), array(
            'numbrinco' => $numbrinco,
            'ativo' => 1,
        ));
        return ($animal);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFichaTecnica($idanimal)
    {
        //phpinfo();
        $lstanimal = $this->obtemAnimalFichaTecnica($idanimal);
        $lsthp = $this->obtemHistoricoPeso($idanimal);

        return view('painel.rebanho.fichatecnica', compact('lstanimal', 'lsthp'));
    }

    private function obtemAnimalFichaTecnica($idanimal)
    {
        $lstanimal = DB::table('animal')
            ->join('lote', 'animal.lote_idlote', '=', 'lote.idlote')
            ->join('tipo_lote', 'tipo_lote.idtipo_lote', '=', 'lote.tipo_lote_idtipo_lote')
            ->join('grau_sangue', 'grau_sangue.idgrau_sangue', '=', 'animal.grau_sangue_idgrau_sangue')
            ->join('raca', 'raca.idraca', '=', 'grau_sangue.raca_idraca')
            ->join('origem', 'origem.idorigem', '=', 'animal.origem_idorigem')
            ->where(
                [
                    ['animal.ativo', '=', '1'],
                    ['animal.idanimal', '=', $idanimal],
                ]
            )
            ->select([
                'animal.idanimal',
                'animal.numero_brinco',
                'animal.nome',
                'animal.dias_vida',
                'animal.peso_entrada',
                'animal.data_nascimento',
                'animal.data_entrada',
                'animal.apelido',
                'animal.foto',
                'animal.observacao',
                'tipo_lote.nome as tlnome',
                'raca.nome as rnome',
                'grau_sangue.descricao as gsnome',
                'origem.nome as ornome',
                'lote.codigo as ltcodigo',
            ])
            ->get();
        return $lstanimal;
    }

    private function obtemHistoricoPeso($idanimal)
    {
        $lsthp = [];
        $lsthistoricopeso = DB::table('historico_peso')
            ->where('historico_peso.animal_idanimal', '=', $idanimal)
            ->select([
                'historico_peso.peso_anterior',
                'historico_peso.peso_atual',
                'historico_peso.data_pesagem',
            ])
            ->orderBy('historico_peso.idhistorico_peso', 'desc')
            ->take(5)
            ->get();

        $lsthp = $this->order_histpeso($lsthistoricopeso);
        return $lsthp;
    }

    private function order_histpeso($obj)
    {
        $itens = [];
        $result = [];
        $perc = 0;
        foreach ($obj as $item) {

            $perc = round(($item->peso_atual - $item->peso_anterior)  / $item->peso_anterior * 100, 2);
            $itens['peso_anterior'] = round($item->peso_anterior, 2);
            $itens['peso_atual'] = round($item->peso_atual, 2);
            $itens['data_pesagem'] = date('d/m/Y', strtotime($item->data_pesagem));
            $itens['perc_variacao'] = $perc;
            $itens['color_icon'] = ($perc < 0) ? "fas fa-caret-down text-danger" : "fas fa-caret-up text-success";

            array_push($result, $itens);
        }

        return $result;
    }
}
