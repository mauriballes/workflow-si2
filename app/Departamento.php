<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = "departamentos";

    protected $fillable = ['nombre','descripcion'];

    public $timestamps = false;

    public function actividades(){
        return $this->hasMany('App\Actividad');
    }

    public function trabajadores(){
        return $this->hasMany('App\Trabajador');
    }
}
