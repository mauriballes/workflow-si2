<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Politica_Negocio extends Model
{
    protected $table = "politicas_negocios";

    protected $fillable = ['nombre','descripcion','tipo_flujo_id'];

    public $timestamps = false;

    public function flujos(){
        return $this->hasMany('App\Flujo','politica_negocio_id','id');
    }

    public function tipo_flujo(){
        return $this->belongsTo('App\Tipo_Flujo');
    }

    public function actividades(){
        return $this->belongsToMany('App\Actividad','flujos','politica_negocio_id','actividad_id')->withPivot('orden');
    }

    public function tramites(){
        return $this->hasMany('App\Tramite');
    }
}
