<?php

namespace App\Http\Controllers;

use App\Departamento;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DepartamentosController extends Controller
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
        $departamentos = Departamento::all();
        return view('models.departamentos.index',compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamento = new Departamento();
        return view('models.departamentos.save',compact('departamento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departamento = new Departamento();
        $departamento->nombre = $request->nombre;
        $departamento->descripcion = $request->descripcion;
        $departamento->save();
        return redirect('departamentos')->with('notice','El departamento ha sido creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  Departamento  $model
     * @return \Illuminate\Http\Response
     */
    public function show($model)
    {
        $departamento = $model;
        return view('models.departamentos.show',compact('departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Departamento  $model
     * @return \Illuminate\Http\Response
     */
    public function edit($model)
    {
        $departamento = $model;
        return view('models.departamentos.save',compact('departamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Departamento  $model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$model)
    {
        $departamento = $model;
        $departamento->nombre = $request->nombre;
        $departamento->descripcion = $request->descripcion;
        $departamento->save();
        return redirect('departamentos')->with('notice','El departamento ha sido modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Departamento  $model
     * @return \Illuminate\Http\Response
     */
    public function destroy($model)
    {
        $departamento = $model;
        $departamento->delete();
        return redirect('departamentos')->with('notice','El departamento ha sido eliminado');
    }
}
