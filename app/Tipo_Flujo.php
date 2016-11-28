<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Flujo extends Model
{
    protected $table = "tipos_flujos";

    protected $fillable = ['descripcion'];

    public $timestamps = false;

    public function politicas_negocios(){
        return $this->hasMany('App\Politica_Negocio');
    }
}
