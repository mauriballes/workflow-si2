@extends('layout.principal')

@section('title')
    Tramites
@endsection

@section('content')
    <h1>Guardar Tramite</h1>
    @if($tramite->exists)
        {!! Form::open(['url' => '/tramites/' . $tramite->id, 'method' => 'PUT']) !!}
    @else
        {!! Form::open(['url' => '/tramites/' . $tramite->id]) !!}
    @endif
    <div class="form-group">
        <label for="fecha_inicio">Fecha Inicio</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion" value="{{$tramite->descripcion}}">
    </div>
    <div class="form-group">
        <label for="politica_negocio_id">Politica de Negocio</label>
        <select class="form-control" name="politica_negocio_id" id="politica_negocio_id">
            @foreach($politicas_negocios as $politica_negocio)
                <option value="{{$politica_negocio->id}}">{{$politica_negocio->nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="cliente_id">Cliente</label>
        <select class="form-control" name="cliente_id" id="cliente_id">
            @foreach($clientes as $cliente)
                <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-default">Crear</button>
    {!! link_to('/tramites/','Cancelar') !!}
    {!! Form::close() !!}
@endsection