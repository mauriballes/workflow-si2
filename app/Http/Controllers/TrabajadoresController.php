<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Historial;
use App\Politica_Negocio;
use App\Trabajador;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TrabajadoresController extends Controller
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
    public function index(Request $request)
    {
        $user = Auth::user();
        $departamento = $user->trabajador->departamento;
        $actividades = $departamento->actividades;
        $collectionhistoriales = collect();
        foreach ($actividades as $actividad) {
            $historiales = $actividad->historiales->where('estado_id', 1);
            foreach ($historiales as $historial) {
                $collectionhistoriales->push($historial);
            }
        }


        $view = view('models.trabajador.index', ['historiales' => $collectionhistoriales]);
        $section = $view->renderSections();


        if($request->ajax())
        {
            return response()->json([
                'historiales' => $section['historiales']
            ]);
        }else{
            return $view;
        }
    }

    public function historiales($model){
        $user = Auth::user();
        $historial = $model;

        $historial->trabajador_id = $user->trabajador->id;
        $historial->estado_id = 2;
        $historial->save();

        return redirect('/trabajadores/actividades');
    }

    public function verHistoriales(){
        $user = Auth::user();
        $historiales = $user->trabajador->historiales->where('estado_id',2);
        return view('models.trabajador.historia',compact('historiales'));
    }

    public function finHistorial(Request $request, $historial){
        // Guardar Cambios
        $user = Auth::user();
        $historial->estado_id = 3;
        $historial->descripcion = $request->descripcion;
        $historial->save();
        $historial->fresh();

        // Adicionar nueva actividad al historial
        $politica_negocio = Politica_Negocio::find($historial->tramite->politica_negocio_id);
        $actividades = $politica_negocio->actividades;
        $id_actividad = '';
        $cantOld = $historial->listarOld()->count() + 2;

        // Para el ultimo
        //dd($historial->actividad->flujos->where('politica_negocio_id',$politica_negocio->id));
        //if($cantOld > Historial::where('tramite_id', $historial->tramite_id)->get()->count())
          //  return redirect('/trabajadores/actividades');

        foreach ($actividades as $actividad) {
            if($actividad->pivot->orden == $cantOld){
                $id_actividad = $actividad->id;
                break;
            }
        }

        $tramite = $historial->tramite;
        $historial = new Historial();
        $historial->tramite_id = $tramite->id;
        $historial->estado_id = 1;
        $historial->actividad_id = $id_actividad;
        $historial->save();

        return redirect('/trabajadores/actividades');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
