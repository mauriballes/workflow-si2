@extends('layout.principal')

@section('title')
    Departamentos
@endsection

@section('content')
    <h1> Informacion Departamento </h1>
    <ul>
        <li> Nombre: {{ $departamento->nombre }} </li>
        <li> Descripcion: {{ $departamento->descripcion }} </li>
    </ul>
    <p>{!! link_to('departamentos','Volver Atras') !!}</p>
@endsection