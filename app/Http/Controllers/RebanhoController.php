<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\Lote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RebanhoController extends Controller
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

        $total = $lstanimal->count();
        $totalemtriagem = $lstanimal->where('idtipo_lote', '=', '10')->count();
        $totalemlactacao = $lstanimal->where('em_lactacao', '=', '1')->count();
        $totalenfermas = $lstanimal->where('idtipo_lote', '=', '9')->count();
        $totalcobertura = $lstanimal->where('idtipo_lote', '=', '1')->count();


        return view('painel.rebanho.dashboard', compact('lstanimal', 'total', 'totalemtriagem','totalemlactacao','totalenfermas','totalcobertura'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function animal()
    {
        return view('painel.rebanho.animal');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function lote()
    {
        return view('painel.rebanho.lote');
    }
}
