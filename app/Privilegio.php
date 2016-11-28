<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilegio extends Model
{
    protected $table = "privilegios";

    protected $fillable = ['descripcion'];

    public $timestamps = false;

    public function usuarios(){
        return $this->hasMany('App\Usuario');
    }
}
