<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoteController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $lstanimal = DB::table('animal')
            ->join('lote', 'animal.lote_idlote', '=', 'lote.idlote')
            ->join('tipo_lote', 'tipo_lote.idtipo_lote', '=', 'lote.tipo_lote_idtipo_lote')
            ->where('animal.ativo', '=', '1')
            ->get();

        $animals = Animal::paginate(4);

        //return view('painel.rebanho.lote');
        return view('painel.rebanho.lote', compact('lstanimal', 'animals'));

    }

    private function listar_lote()
    {
        $lstlote = Lote::get()->sortBy('nome');
        return ($lstlote);
    }

}
