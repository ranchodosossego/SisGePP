<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


use App\Models\Animal;
use App\Models\GrauSangue;
use App\Models\Origem;
use App\Models\Propriedade;
use App\Models\Raca;
use App\Models\Usuario;
use App\Models\ClassificacaoEtaria;

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
        $lstraca = Raca::get()->sortBy('nome');
        $lstorigem = Origem::get()->sortByDesc('nome');
        $lstgrausangue = GrauSangue::get();
        return view('painel.rebanho.animal', compact('lstraca', 'lstorigem', 'lstgrausangue'));
    }

    public function listraca()
    {
        $lstraca = Raca::all();
        return response()->json([
            'lstraca' => $lstraca,
        ]);
    }

    public function listorigem()
    {
        $lstorigem = Origem::all();
        return response()->json([
            'lstorigem' => $lstorigem,
        ]);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function read()
    {
        $animal = Animal::all();
        return response()->json([
            'animal' => $animal,
        ]);
    }

    /**
     * Cria um novo animal
     *
     * @param Request $request
     * @return void Json
     */
    public function create(Request $request)
    {



        $validator = Validator::make($request->all(), [
            'nome' => 'required|max:25',
            'genero' => 'required',
            'dias_vida' => 'required|integer|min:1|max:10000',
            'data_entrada' => 'required',
            'data_nascimento' => 'required',
            'peso_entrada' => 'required|integer|min:1|max:1000',

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
            // Dados do Indivíduo
            $animal = new Animal;
            $animal->nome = $request->input('nome');
            $animal->genero = $request->input('genero');
            $animal->dias_vida = $request->input('dias_vida');

            $animal->peso_entrada = $request->input('peso_entrada');
            $animal->apelido = $request->input('apelido');
            $animal->foto = $request->input('foto');
            $animal->numero_brinco = $request->input('numero_brinco');
            $animal->numero_sisbov = $request->input('numero_sisbov');
            $animal->observacao = $request->input('observacao');
            $animal->rgd = $request->input('rgd');
            $animal->rgn = $request->input('rgn');
            $animal->data_entrada = strtotime($request->input('data_entrada'));
            $animal->data_nascimento = strtotime($request->input('data_nascimento'));

            $animal->propriedade_idpropriedade = $propid;
            $animal->raca_idraca = $request->input('raca_idraca');
            $animal->grau_sangue_idgrau_sangue = $request->input('grau_sangue_idgrau_sangue');
            $animal->origem_idorigem = $request->input('origem_idorigem');

            //$animal->classificacao_etaria_idclassificacao_etaria = $fxetaria[0]->idclassificacao_etaria;
            // $animal->propriedade_idpropriedade = $propid;
            // $animal->classificacao_etaria_idclassificacao_etaria = $fxetaria;

            $animal->save();
            return response()->json([
                'status' => 200,
                'message' => 'Student Added Successfully.'
            ]);
        }
    }


    function classificacao_etaria($diasvida)
    {
        $fxetaria = DB::select(DB::raw("SELECT idclassificacao_etaria FROM classificacao_etaria WHERE :diasvida BETWEEN dia_inicial AND dia_final"), array(
            'diasvida' => $diasvida,
        ));
        return ($fxetaria);
    }
}
