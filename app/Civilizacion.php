<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Civilizacion extends Model
{
    protected $table = 'civilizacions';

    public function ejercitos(){
        return $this->hasMany('App\Ejercito');
    }
}
