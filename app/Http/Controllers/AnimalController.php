<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Animal;
use App\Models\GrauSangue;
use App\Models\Origem;
use App\Models\Propriedade;
use App\Models\Raca;
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
            'genero' => 'required|max:1',
            'data_entrada' => 'required|max:15',
            'peso_entrada' => 'required|max:5',

            'grau_sangue_idgrau_sangue' => 'required|max:5',
            'raca_idraca' => 'required|max:5',
            'propriedade_idpropriedade' => 'required|max:5',
            'origem_idorigem' => 'required|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag()->getMessages(),
            ]);
        } else {
            $animal = new Animal;

            // Dados do Indivíduo
            $animal->grau_sangue_idgrau_sangue = $request->input('grau_sangue_idgrau_sangue');
            $animal->origem_idorigem = $request->input('origem_idorigem');
            $animal->peso_entrada = $request->input('peso_entrada');
            $animal->propriedade_idpropriedade = $request->input('propriedade_idpropriedade');
            $animal->raca_idraca = $request->input('raca_idraca');
            $animal->apelido = $request->input('apelido');
            $animal->foto = $request->input('foto');
            $animal->genero = $request->input('genero');
            $animal->nome = $request->input('nome');
            $animal->numero_brinco = $request->input('numero_brinco');
            $animal->numero_sisbov = $request->input('numero_sisbov');
            $animal->observacao = $request->input('observacao');
            $animal->rgd = $request->input('rgd');
            $animal->rgn = $request->input('rgn');
            $animal->data_entrada = $request->input('data_entrada');

            //$animal->save();
            return response()->json([
                'status' => 200,
                'message' => 'Student Added Successfully.'
            ]);
        }
    }
}
