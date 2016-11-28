@extends('layout.principal')

@section('title')
    Actividades
@endsection

@section('content')
    <h1>Actividades</h1>
    @if(session('notice'))
        <p><strong>{{ session('notice') }}</strong></p>
    @endif
    <p>  {!! link_to('actividades/crear', 'Crear Nueva Actividad') !!}  </p>
    @if($actividades->count())
        @include('partials.actividades.collection',compact('actividades'))
    @else
        <p>No existen actividades creadas</p>
    @endif
@endsection