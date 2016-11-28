@extends('layout.principal')

@section('title')
    Departamentos
@endsection

@section('content')
    <h1>Departamentos</h1>
    @if(session('notice'))
        <p><strong>{{ session('notice') }}</strong></p>
    @endif
    <p>  {!! link_to('departamentos/crear', 'Crear Nuevo Departamento') !!}  </p>
    @if($departamentos->count())
        @include('partials.departamentos.collection',compact('departamentos'))
    @else
        <p>No existen departamentos creados</p>
    @endif
@endsection