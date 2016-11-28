<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $table = "trabajadores";

    protected $fillable = ['nombre','telefono','direccion','cargo','departamento_id','user_id'];

    public $timestamps = false;

    public function departamento(){
        return $this->belongsTo('App\Departamento');
    }

    public function historiales(){
        return $this->hasMany('App\Historial');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
