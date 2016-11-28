<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Estado;
use App\Flujo;
use App\Historial;
use App\Politica_Negocio;
use App\Tramite;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TramitesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tramites = Tramite::all();
        
        return view('models.tramites.index',compact('tramites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tramite = new Tramite();
        $politicas_negocios = Politica_Negocio::all();
        $clientes = Cliente::all();
        return view('models.tramites.save',compact('tramite','politicas_negocios','clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tramite = new Tramite();
        $tramite->fecha_inicio = $request->fecha_inicio;
        $tramite->descripcion = $request->descripcion;
        $tramite->cliente_id = $request->cliente_id;
        $tramite->politica_negocio_id = $request->politica_negocio_id;
        $tramite->save();
        $tramite->fresh();

        $politica_negocio = Politica_Negocio::find($tramite->politica_negocio_id);
        $actividades = $politica_negocio->actividades;
        $id_actividad = '';
        foreach ($actividades as $actividad) {
            if($actividad->pivot->orden == 1){
                $id_actividad = $actividad->id;
                break;
            }
        }

        $historial = new Historial();
        $historial->tramite_id = $tramite->id;
        $historial->estado_id = 1;
        $historial->actividad_id = $id_actividad;
        $historial->save();

        return redirect('/tramites/')->with('notice','Se ha creado el historial perfectamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
