<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 20/02/20
 * Time: 16:32
 */

namespace App\Http\Controllers;

use App\Http\Controllers\UnidadPadre as UnidadPadre;
use App\Http\Controllers\UnidadInterface as UnidadInterface;
use Illuminate\Support\Facades\Config;

class Arquero extends UnidadPadre implements UnidadInterface
{
    function __construct($fi) {
        parent::__construct($fi);
        $this->setTipo("Arquero");
    }
    public function entrenar(){

        $resultado=$this->getPuntos() + Config::get('datosIniciales.fuerzaEntrenamiento.Arquero');
        $this->setPuntos($resultado);
    }
    public function isTransformable(){
        return TRUE;
    }
}
