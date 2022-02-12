<?php

namespace App\Http\Controllers\Painel\Estoque;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        // $lstalimento = DB::table('alimento')
        //     ->where('alimento.ativo', '=', '1')
        //     ->orderBy('nome', 'asc')
        //     ->get();

        // $lstlote = Lote::all();
        // $lstlote = [];
        // return view('painel.estoque.racao', compact('lstlote'));
    }

    public function racao()
    {
        // $lstalimento = DB::table('alimento')
        //     ->where('alimento.ativo', '=', '1')
        //     ->orderBy('nome', 'asc')
        //     ->get();

        // $lstlote = Lote::all();
        $lstlote = [];
        return view('painel.estoque.racao', compact('lstlote'));
    }


}
