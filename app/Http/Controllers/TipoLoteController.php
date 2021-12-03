<?php

namespace App\Http\Controllers;

use App\Models\TipoLote;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TipoLoteController extends Controller
{

    public function getTipoLote()
    {
        $lstlote = TipoLote::all();
        return DataTables::of($lstlote)
            ->make(true);
    }

}
