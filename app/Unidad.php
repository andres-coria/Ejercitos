<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unidad extends Model
{
    use SoftDeletes;
    protected $table = 'unidads';

    public function ejercito(){
        return $this->belongsTo('App\Ejercito');
    }

    public function IsActive(){
        return !!!$this->deleted_at ? true: false;
    }

    public function IsTransformable(){
        return $this->transformable;
    }
}
