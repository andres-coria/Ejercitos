<?php

namespace App\Http\Controllers;

use App\Batalla;
use Illuminate\Http\Request;

class BatallaController extends Controller
{

    private $ganador;

    function __construct($ejercito1, $ejercito2) {

        if($ejercito1->getFuerza() > $ejercito2->getFuerza()){
            //gano el 1
            $ejercito1->setOro($ejercito1->getOro()+100);
            $ejercito2->pierdeUnidad();
            $ejercito2->pierdeUnidad();
            $this->ganador=$ejercito1->getCivilizacion();

        }
        elseif ($ejercito1->getFuerza()< $ejercito2->getFuerza()){
            //gano el 2
            $ejercito2->setOro($ejercito2->getOro()+100);
            $ejercito1->pierdeUnidad();
            $ejercito1->pierdeUnidad();
            $this->ganador=$ejercito2->getCivilizacion();
        }
        else{
            //empate
            $ejercito1->pierdeUnidad();
            $ejercito2->pierdeUnidad();
            $this->ganador="Empate";
        }
    }


    public function getGanador(){
        return $this->ganador;
    }
}
