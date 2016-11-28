<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    protected $table = "tramites";

    protected $fillable = ['fecha_inicio','fecha_fin','descripcion','cliente_id','politica_negocio_id'];

    public $timestamps = false;

    public function cliente(){
        return $this->belongsTo('App\Cliente');
    }

    public function historiales(){
        return $this->hasMany('App\Historial');
    }

    public function politica_negocio(){
        return $this->belongsTo('App\Politica_Negocio');
    }
}
