<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Lote;

class LoteController extends Controller
{

    private function listar_lote()
    {
        $lstlote = Lote::get()->sortBy('nome');
        return ($lstlote);
    }

}
