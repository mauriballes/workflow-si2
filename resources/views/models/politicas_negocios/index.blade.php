@extends('layout.principal')

@section('title')
    Politicas de Negocios
@endsection

@section('content')
    <h1>Politicas de Negocios</h1>
    @if(session('notice'))
        <p><strong>{{ session('notice') }}</strong></p>
    @endif
    <p>  {!! link_to('politicas-negocios/crear', 'Crear Nueva Politica de Negocio') !!}  </p>
    @if($politicas_negocios->count())
        @include('partials.politicas_negocios.collective',compact('politicas_negocios'))
    @else
        <p>No existen Politicas de Negocio creadas</p>
    @endif
@endsection