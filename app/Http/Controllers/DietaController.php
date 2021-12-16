<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dieta;
use App\Models\Lote;

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
        $lstlote = Lote::all();
        return view('painel.rebanho.dieta', compact('lstlote'));
    }
    //
    // public function calcular_ms(Request $request)
    // {
    //     $peso_corporal = $request->input('peso_vivo');
    //     $percent_peso_corporal = $request->input('percent_peso_corporal');
    //     $ms = $peso_corporal * $percent_peso_corporal / 100;

    //     return $ms;
    // }
}
