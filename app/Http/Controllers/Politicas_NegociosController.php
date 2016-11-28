<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Flujo;
use App\Politica_Negocio;
use App\Tipo_Flujo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Politicas_NegociosController extends Controller
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
        $politicas_negocios = Politica_Negocio::all();
        return view('models.politicas_negocios.index',compact('politicas_negocios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $politica_negocio = new Politica_Negocio();
        $actividades = Actividad::all();
        $tipos_flujos = Tipo_Flujo::all();
        return view('models.politicas_negocios.save',compact('politica_negocio','actividades','tipos_flujos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $politica_negocio = new Politica_Negocio();
        $politica_negocio->nombre = $request->nombre;
        $politica_negocio->descripcion = $request->descripcion;
        $politica_negocio->tipo_flujo_id = $request->tipo_flujo_id;
        $politica_negocio->save();

        $i = 0;
        $politica_negocio_id = $politica_negocio->id;

        while ($i < count($request->ids)){
            $id = $request->ids[$i];
            $orden = $request->ordenes[$i];

            $flujo = new Flujo();
            $flujo->orden = $orden;
            $flujo->politica_negocio_id = $politica_negocio_id;
            $flujo->actividad_id = $id;
            $flujo->save();
            $i++;
        }
        return redirect('politicas-negocios')->with('notice','La politica de negocio ha sido creada correctamente');
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
