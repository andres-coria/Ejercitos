<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ejercito extends Model
{
    protected $table = 'ejercitos';

    public function civilizacion(){
        return $this->belongsTo('App\Civilizacion');
    }

    public function batallas(){
        return $this->belongsToMany('App\Batalla')->withPivot('ganador');

    }

    public function unidades(){
        return $this->hasMany('App\Unidad');
    }

}
