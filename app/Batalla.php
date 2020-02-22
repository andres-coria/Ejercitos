<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batalla extends Model
{
    protected $table = 'batallas';
    protected $fillable = [2];

    public function ejercitos(){
        return $this->belongsToMany('App\Ejercito')->withPivot('ganador');

    }
}
