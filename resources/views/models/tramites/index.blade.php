@extends('layout.principal')

@section('title')
    Tramites
@endsection

@section('content')
    <h1>Tramites</h1>
    @if(session('notice'))
        <p><strong>{{ session('notice') }}</strong></p>
    @endif
    <p>  {!! link_to('tramites/crear', 'Crear Nuevo Tramite') !!}  </p>
    @if($tramites->count())
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Descripcion</th>
                <th>Cliente</th>
                <th>Politica de Negocio</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tramites as $tramite)
                <tr class="alert-{{$tramite->historiales->last()->estado->color}}">
                    <td>{{ $tramite->id }}</td>
                    <td>{{ $tramite->descripcion }}</td>
                    <td>{{ $tramite->cliente->nombre }}</td>
                    <td>{{ $tramite->politica_negocio->nombre }}</td>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No existen Tramites creados</p>
    @endif
@endsection