<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flujo extends Model
{
    protected $table = "flujos";

    protected $fillable = ['orden','politica_negocio_id','actividad_id'];

    public $timestamps = false;

    public function actividad(){
        return $this->belongsTo('App\Actividad');
    }

    public function politica_negocio(){
        return $this->belongsTo('App\Politica_Negocio');
    }
}
