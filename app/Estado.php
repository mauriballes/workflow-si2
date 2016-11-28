<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = "estados";

    protected $fillable = ['nombre'];

    public $timestamps = false;

    public function historiales(){
        return $this->hasMany('App\Historial');
    }
}
