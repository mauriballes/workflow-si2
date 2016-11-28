<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = "actividades";

    protected $fillable = ['nombre','descripcion','departamento_id'];

    public $timestamps = false;

    public function departamento(){
        return $this->belongsTo('App\Departamento');
    }

    public function flujos(){
        return $this->hasMany('App\Flujo');
    }

    public function politicas_negocios(){
        return $this->belongsToMany('App\Politica_Negocio','flujos','actividad_id','politica_negocio_id');
    }

    public function historiales(){
        return $this->hasMany('App\Historial');
    }
}

