<?php

namespace App\Http\Controllers;

use App\Ejercito;
use Illuminate\Http\Request;
use App\Unidad;
use Illuminate\Support\Facades\Config;


class EjercitoController extends Controller
{
    private $oro;
    private $civilizacion;
    private $fuerza;
    private $ejercito=array();


    function __construct($civilizacion) {

        $this->setCivilizacion($civilizacion);
        $this->setOro(Config::get('datosIniciales.oroAlInicio'));
        $this->ejercito=$this->crearEjercito($civilizacion);
        $this->fuerza=$this->calcularFuerza();
    }

    public function setCivilizacion($c){
        $this->civilizacion=$c;
    }
    public function getCivilizacion(){
        return $this->civilizacion;
    }
    public function setOro($o){
        $this->oro=$o;
    }
    public function getOro(){
        return $this->oro;
    }
    public function getEjercito(){
        return $this->ejercito;
    }

    public function getFuerza(){
        return $this->calcularFuerza();
    }

    public function crearEjercito($civilizacion)
    {
            $id=1;
            foreach (Config::get('datosIniciales.unidadesAlInicio.'.$civilizacion) as $tipo =>$cantidad){

                for ($i=0;$i<$cantidad;$i++){

                    $ejercito[$id]=UnidadFactoryController::crearUnidad($tipo);

                    $id++;
                }
            }
            return $ejercito;
    }

    public function pierdeUnidad()
    {
        //ordeno de menor a mayor por puntos
        uasort ( $this->ejercito , function ($a, $b) {
            return strnatcmp($a->getPuntos(),$b->getPuntos());
        }
        );
         //saco el ultimo(el que tiene mas puntos, o sea la unidad mas fuerte
        array_pop($this->ejercito);
    }

    public function calcularFuerza()
    {
        $fuerza=0;

        foreach ($this->ejercito as $unidad){
            $fuerza=$fuerza + $unidad->getPuntos();
        }

        return $fuerza;

    }

    public function entrenar($unidad){

            $tipo=$unidad->getTipo();

            $costo=Config::get('datosIniciales.costoEntrenamiento.'.$tipo);

            if($this->oro >= $costo){
              $unidad->entrenar();
                $this->oro=$this->oro-$costo;
            }

    }

    public function transformar($unidad,$pos){

        $tipo=$unidad->getTipo();

        $costo=Config::get('datosIniciales.costoTransformacion.'.$tipo);

        if(($unidad->isTransformable())&&($this->oro >= $costo)){

            if($tipo=="Piquero"){
                $nuevaUnidad=UnidadFactoryController::crearUnidad("Arquero");
            }
            else{
                $nuevaUnidad=UnidadFactoryController::crearUnidad("Caballero");
            }

            unset($this->ejercito[$pos]);
            $this->oro=$this->oro-$costo;
            $this->ejercito[$pos]=$nuevaUnidad;
        }
    }




}
