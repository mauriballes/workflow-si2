@extends('layout.principal')

@section('title')
    Actividades
@endsection

@section('content')
    <h1> Informacion Actividad </h1>
    <ul>
        <li> Nombre: {{ $actividad->nombre }} </li>
        <li> Descripcion: {{ $actividad->descripcion }} </li>
        <li> Departamento Encargado: {{ $actividad->departamento->nombre }} </li>
    </ul>
    <p>{!! link_to('actividades','Volver Atras') !!}</p>
@endsection