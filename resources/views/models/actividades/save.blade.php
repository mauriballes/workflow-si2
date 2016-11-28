@extends('layout.principal')

@section('title')
    Actividades
@endsection

@section('content')
    <h1> Guardar Actividad </h1>
    {!! Form::open(['url' => '/actividades/' . $actividad->id]) !!}
    @if($actividad->id)
        {!! Form::hidden('_method', 'PUT') !!}
    @endif
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="{{$actividad->nombre}}">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion" value="{{$actividad->descripcion}}">
    </div>

    @if($departamentos->count())
        <div class="form-group">
            <label for="departamento_id">Departamento</label>
            <select class="form-control" name="departamento_id" id="departamento_id">
                @foreach($departamentos as $departamento)
                    <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-default">Crear</button>
    @else
        <p>No existen departamentos</p>
        <br>
        <p>Debe crear previamente los departamentos antes de las actividades</p>
        <br>
    @endif
    {!! link_to('/actividades/','Cancelar') !!}
    {!! Form::close() !!}
@endsection