<?php

namespace App\Http\Controllers;

use App\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;


class UnidadFactoryController extends Controller
{

    public static function UnidadFactory($tipo, $fuerza){

        switch($tipo){
            case 'Piquero':
                $unidad = new Piquero($fuerza);
                break;
            case 'Arquero':
                $unidad = new Arquero($fuerza);
                break;
            case 'Caballero':
                $unidad = new Caballero($fuerza);
                break;
            default:
                $unidad = null;
        }
        return $unidad;
    }

    public static function crearUnidad($tipo){

        return self::UnidadFactory($tipo, Config::get('datosIniciales.fuerzaInicial.'.$tipo));

    }

}
