<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DietaController extends Controller
{
    //
    public function calcular_ms(Request $request)
    {
        $peso_corporal = $request->input('peso_vivo');
        $percent_peso_corporal = $request->input('percent_peso_corporal');
        $ms = $peso_corporal * $percent_peso_corporal / 100;

        return $ms;
    }
}
