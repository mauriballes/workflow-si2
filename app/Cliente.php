<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";

    protected $fillable = ['nombre','telefono','direccion'];

    public $timestamps = false;

    public function tramites(){
        return $this->hasMany('App\Tramite');
    }
}

