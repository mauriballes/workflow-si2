@extends('layout.principal')

@section('title')
    Departamentos
@endsection

@section('content')
    <h1> Guardar Departamento </h1>
    {!! Form::open(['url' => '/departamentos/' . $departamento->id]) !!}
    @if($departamento->id)
        {!! Form::hidden('_method', 'PUT') !!}
    @endif
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="{{$departamento->nombre}}">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion" value="{{$departamento->descripcion}}">
        </div>
    <button type="submit" class="btn btn-default">Crear</button>
    {!! link_to('/departamentos/','Cancelar') !!}
    {!! Form::close() !!}
@endsection