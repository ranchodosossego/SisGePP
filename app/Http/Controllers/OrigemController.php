<?php

namespace App\Http\Controllers;

use App\Models\Origem;
use Illuminate\Http\Request;

class OrigemController extends Controller
{
    //
    public function listorigem()
    {
        $lstorigem = Origem::all();
        return response()->json([
            'lstorigem' => $lstorigem,
        ]);
    }

}
