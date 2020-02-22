<?php

namespace App\Http\Controllers;

use App\Civilizacion;
use Illuminate\Http\Request;

class CivilizacionController extends Controller
{
    public static function iniciarCivilizaciones(){

        $c['Chinos']=new EjercitoController("Chinos");
        $c['Ingleses']=new EjercitoController("Ingleses");
        $c['Bizantinos']=new EjercitoController("Bizantinos");

        return $c;

    }
}
