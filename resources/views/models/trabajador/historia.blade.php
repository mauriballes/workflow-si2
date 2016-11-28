@extends('layout.principal')

@section('title')
    Atencion
    @endsection

@section('content')
    <h1>Atender Actividad</h1>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        @foreach($historiales as $historial)
            <div class="panel panel-{{$historial->estado->color}}">
                <div class="panel-heading" role="tab" id="heading{{$historial->id}}">
                    <div class="row">
                        <div class="col-md-10 col-sm-10 col-lg-10">
                            {{$historial->actividad->nombre}}
                        </div>
                        <div class="col-md-2 col-sm-2 col-lg-2">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#collapse{{$historial->id}}"
                               aria-expanded="false" aria-controls="collapse{{$historial->id}}">
                                Atender
                            </a>
                        </div>
                    </div>
                </div>
                <div id="collapse{{$historial->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$historial->id}}">
                    <div class="panel-body">
                        <div class="panel-group">
                            <h5>Datos de la Actividad</h5>
                            <label>Tramite: {{$historial->tramite->descripcion}}</label>
                            <br>
                            <label>Actividad: {{$historial->actividad->nombre}}</label>
                            <br>
                            <label>Cliente: {{$historial->tramite->cliente->nombre}}</label>
                            <br>
                            <label>Fecha: {{$historial->tramite->fecha_inicio}}</label>
                        </div>
                        <div class="panel-group">
                            <h5>Historiales</h5>
                            @foreach($historial->listarOld() as $historial)
                                {{ $historial->descripcion }}
                                <br>
                                @endforeach
                        </div>
                        {!! Form::open(['url' => '/trabajadores/actividades/' . $historial->id,'method' => 'PUT']) !!}
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                        </div>
                        <div class="form-group">
                            <textarea name="descripcion" id="descripcion"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Finalizar</button>
                        {!! link_to('/trabajadores/actividades/','Cancelar') !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endsection