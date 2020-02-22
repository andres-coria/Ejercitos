<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 20/02/20
 * Time: 19:24
 */

namespace App\Http\Controllers;


class HomeController
{
    public function iniciarEjercicio(){

        $ejercicio=CivilizacionController::iniciarCivilizaciones();

        //Inicio
        echo "<h1>###### Ejercitos al inicio del ejercicio ######</h1>";
        echo "<pre>";

        foreach ($ejercicio as $ejercito){
            print_r($ejercito);
        }

        //Entrenamiento
        echo "<h1>###### Entreno quinta unidad China ######</h1>";
        echo "<br> oro del ejercito al inicio: ".$ejercicio['Chinos']->getOro();
        echo "<br> fuerza del ejercito al inicio: ".$ejercicio['Chinos']->getFuerza();
        $aEntrenar=$ejercicio['Chinos']->getEjercito()[5];
        $ejercicio['Chinos']->entrenar($aEntrenar);
        echo "<br> Ejercito al finalizar el entrenamiento: ";
        print_r($ejercicio['Chinos']->getEjercito());
        echo "<br> oro del ejercito al finalizar el entrenamiento: ".$ejercicio['Chinos']->getOro();
        echo "<br> fuerza del ejercito al finalizar el entrenamiento: ".$ejercicio['Chinos']->getFuerza();


        //Transformacion
        echo "<h1>###### Transformo primera unidad inglesa ######</h1>";
        echo "<br> oro del ejercito al inicio: ".$ejercicio['Ingleses']->getOro();
        echo "<br> fuerza del ejercito al inicio: ".$ejercicio['Ingleses']->getFuerza();
        $ejercicio['Ingleses']->transformar($ejercicio['Ingleses']->getEjercito()[1],1);
        echo "<br> Ejercito al finalizar la Transformacion: ";
        print_r($ejercicio['Ingleses']);
        echo "<br> oro del ejercito al finalizar la Transformacion: ".$ejercicio['Ingleses']->getOro();
        echo "<br> fuerza del ejercito al finalizar la Transformacion: ".$ejercicio['Ingleses']->getFuerza();


        echo "<h1>###### Intento transformar un caballero bizantino (unidad nro. 15) ######</h1>";
        echo "<br> oro del ejercito al inicio: ".$ejercicio['Bizantinos']->getOro();
        echo "<br> fuerza del ejercito al inicio: ".$ejercicio['Bizantinos']->getFuerza();
        $ejercicio['Ingleses']->transformar($ejercicio['Bizantinos']->getEjercito()[15],15);
        echo "<br> Ejercito al finalizar la Transformacion: ";
        print_r($ejercicio['Bizantinos']);
        echo "<br> oro del ejercito al finalizar la Transformacion: ".$ejercicio['Bizantinos']->getOro();
        echo "<br> fuerza del ejercito al finalizar la Transformacion: ".$ejercicio['Bizantinos']->getFuerza();

        //Batalla
        echo "<h1>###### Batalla ingleses VS Bizantinos ######</h1>";
        echo "<br> oro del ejercito ingles al inicio: ".$ejercicio['Ingleses']->getOro();
        echo "<br> oro del ejercito bizantino al inicio: ".$ejercicio['Bizantinos']->getOro();
        echo "<br> fuerza del ejercito ingles al inicio: ".$ejercicio['Ingleses']->getFuerza();
        echo "<br> fuerza del ejercito bizantino al inicio: ".$ejercicio['Bizantinos']->getFuerza();

        $batalla=new BatallaController($ejercicio['Ingleses'],$ejercicio['Bizantinos']);
        echo "<br> GANO: ".$batalla->getGanador();
        echo "<br> oro del ejercito ingles al final: ".$ejercicio['Ingleses']->getOro();
        echo "<br> oro del ejercito bizantino al final: ".$ejercicio['Bizantinos']->getOro();
        echo "<br> fuerza del ejercito ingles al final: ".$ejercicio['Ingleses']->getFuerza();
        echo "<br> fuerza del ejercito bizantino al final: ".$ejercicio['Bizantinos']->getFuerza();



    }
}
