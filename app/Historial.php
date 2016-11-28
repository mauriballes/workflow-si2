<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table = "historiales";

    protected $fillable = ['descripcion','tramite_id','actividad_id','trabajador_id','estado_id'];

    public $timestamps = false;

    public function actividad(){
        return $this->belongsTo('App\Actividad');
    }

    public function estado(){
        return $this->belongsTo('App\Estado');
    }

    public function trabajador(){
        return $this->belongsTo('App\Trabajador');
    }

    public function tramite(){
        return $this->belongsTo('App\Tramite');
    }

    public function listarOld(){
        $politica_negocio = Politica_Negocio::all()->where('id',$this->tramite->politica_negocio_id)->first();
        $flujos = $politica_negocio->flujos;
        $flujo = '';

        // Averiguar el orden
        foreach($flujos as $fl){
            if ($this->actividad->id == $fl->actividad_id)
                $flujo=$fl;
        }

        $flujos= Flujo::where('orden','<',$flujo->orden)->where('politica_negocio_id','=',$politica_negocio->id)->get();
        $historiales = collect();
        foreach ($flujos as $flujo){
            foreach ($flujo->actividad->historiales as $historial)
            {
                if($historial->tramite_id == $this->tramite->id)
                $historiales->push($historial);
            }
        }

        return $historiales;
    }
}
