<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Models\Raca;
use App\Models\Animal;
use App\Models\Origem;
use App\Models\Lote;
use App\Models\TipoLote;
use App\Models\Usuario;
use App\Models\GrauSangue;
use App\Models\Propriedade;
use App\Models\ClassificacaoEtaria;
use MigrationsGenerator\Generators\MigrationConstants\Method\Foreign;
use Yajra\DataTables\DataTables;


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
    public function updateAnimal(Request $request)
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

    public function getAnimal(Request $request)
    {
        $message = $request->get('idanimal');

        $animal = DB::table('animal')
            ->join('lote', 'animal.lote_idlote', '=', 'lote.idlote')
            ->join('tipo_lote', 'tipo_lote.idtipo_lote', '=', 'lote.tipo_lote_idtipo_lote')
            ->where('animal.ativo', '=', '1')
            ->where('animal.idanimal', '=', $message)
            ->select([
                'animal.idanimal', 'animal.numero_brinco', 'animal.nome', 'animal.dias_vida', 'animal.apelido',
                'tipo_lote.nome  as tnome', 'animal.observacao', 'animal.peso_entrada', 'animal.data_nascimento',
                'animal.apelido', 'animal.foto', 'tipo_lote.idtipo_lote'
            ])
            ->get();
        return response()->json([
            'data' => $animal,
        ]);
        //return ($animal);
    }

    public function getAnimalList()
    {
        $lstanimal = DB::table('animal')
            ->join('lote', 'animal.lote_idlote', '=', 'lote.idlote')
            ->join('tipo_lote', 'tipo_lote.idtipo_lote', '=', 'lote.tipo_lote_idtipo_lote')
            ->where('animal.ativo', '=', '1')
            ->select(['animal.idanimal', 'animal.numero_brinco', 'animal.nome', 'animal.dias_vida', 'animal.apelido', 'tipo_lote.nome  as tnome'])
            ->get();

        return DataTables::of($lstanimal)
            ->addColumn('numero_brinco', function ($lstanimal) {
                return Str::padLeft((string)$lstanimal->numero_brinco, 5, '0');
            })
            ->addColumn('action', function ($lstanimal) {
                return '<button onclick="msgs(\'' . $lstanimal->idanimal . '\');" class="btn btn-outline-success btn-sm col-8 me-0">' . $lstanimal->nome . '</button>';
            })
            ->addColumn('actions', function ($lstanimal) {
                $butoes = '<div class="btn-group btn-group-sm">' .
                '<a href="#" onclick="deletar(\'' . $lstanimal->idanimal . '\');" class="btn btn-outline-danger" data-tooltip="Remover a ' . $lstanimal->nome . '"><i class="fas fa-trash"></i></a>' .
                '<a href="#" data-toggle="modal" data-id="' . $lstanimal->idanimal . '"  data-target="#modal-atualizar" class="btn btn-outline-warning open-modal" data-tooltip="Atualizar a ' . $lstanimal->nome .'"><i class="fas fa-share-square"></i></a>' .
                '</div>';
                return $butoes;
            })
            ->rawColumns(['action', 'actions'])
            ->make(true);
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
}
