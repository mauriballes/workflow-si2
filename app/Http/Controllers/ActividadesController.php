<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Departamento;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActividadesController extends Controller
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
        $actividades = Actividad::all();
        return view('models.actividades.index',compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actividad = new Actividad();
        $departamentos = Departamento::all();
        return view('models.actividades.save',compact('actividad','departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actividad = new Actividad();
        $actividad->nombre = $request->nombre;
        $actividad->descripcion = $request->descripcion;
        $actividad->departamento_id = $request->departamento_id;
        $actividad->save();
        return redirect('actividades')->with('notice','La actividad ha sido creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  Actividad  $model
     * @return \Illuminate\Http\Response
     */
    public function show($model)
    {
        $actividad = $model;
        return view('models.actividades.show',compact('actividad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Actividad  $model
     * @return \Illuminate\Http\Response
     */
    public function edit($model)
    {
        $actividad = $model;
        $departamentos = Departamento::all();
        return view('models.actividades.save',compact('actividad','departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Actividad  $model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $model)
    {
        $actividad = $model;
        $actividad->nombre = $request->nombre;
        $actividad->descripcion = $request->descripcion;
        $actividad->departamento_id = $request->departamento_id;
        $actividad->save();
        return redirect('actividades')->with('notice','La actividad ha sido modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Actividad  $model
     * @return \Illuminate\Http\Response
     */
    public function destroy($model)
    {
        $actividad = $model;
        $actividad->delete();
        return redirect('actividades')->with('notice','La actividad ha sido eliminada');
    }
}
