<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 20/02/20
 * Time: 15:48
 */

namespace App\Http\Controllers;


abstract class UnidadPadre
{

    protected $puntos;
    protected $tipo;

    function __construct($fuerzaInicial) {
        $this->setPuntos($fuerzaInicial);
    }

    public function setPuntos($p){
        $this->puntos=$p;
    }
    public function getPuntos(){
        return $this->puntos;
    }
    public function setTipo($t){
        $this->tipo=$t;
    }
    public function getTipo(){
        return $this->tipo;
    }

}
