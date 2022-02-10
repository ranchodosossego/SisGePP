<?php

namespace App\Http\Controllers\Painel\Sanidade;

use App\Http\Controllers\Controller;
use App\Models\Lote;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class ProntuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['squirrel'] = $squirrel;
        // return View::make('simple', $data);


        $lstlote = Lote::all();
        return view('painel.sanidade.prontuario', compact('lstlote'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProntuario($idanimal)
    {
        // $data['squirrel'] = $squirrel;
        // return View::make('simple', $data);


        $lstlote = Lote::all();
        return view('painel.sanidade.prontuario', compact('lstlote'));
    }

}
