@extends('layout.principal')

@section('title')
    Politicas De Negocios
@endsection

@section('content')
    <h1> Guardar Politica de Negocio </h1>

    @if($politica_negocio->exists)
        {!! Form::open(['url' => '/politicas-negocios/' . $politica_negocio->id, 'method' => 'PUT']) !!}
        @else
        {!! Form::open(['url' => '/politicas-negocios/' . $politica_negocio->id]) !!}
    @endif
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="{{$politica_negocio->nombre}}">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion" value="{{$politica_negocio->descripcion}}">
    </div>

    <div class="form-group">
        <label for="tipo_flujo_id">Tipo de Flujo</label>
        <select class="form-control" name="tipo_flujo_id" id="tipo_flujo_id">
            @foreach($tipos_flujos as $tipo_flujo)
                <option value="{{$tipo_flujo->id}}">{{$tipo_flujo->descripcion}}</option>
            @endforeach
        </select>
    </div>

    <!-- Button trigger modal -->
    <div class="form-group">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
            Seleccionar Actividades
        </button>
    </div>

    <div class="form-group">

        <button type="submit" class="btn btn-default">Crear</button>
        {!! link_to('/politicas-negocios/','Cancelar') !!}
    </div>

    <div class="form-group">
    <table class="table table-hover">
        <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>Orden</th>
        </thead>
        <tbody id="detalleActividades">

        </tbody>
    </table>
    </div>

    {!! Form::close() !!}

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Actividades</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @include('partials.actividades.collection',compact('actividades'))
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('scripts')
    <script>

        var orden = 0;

    $(document).on('click','.clickable',function (e) {
        var tds = $(this).children('td'); //Obtengo los hijos
        var tdid = tds[0];
        var tdnombre = tds[1];
        AgregarActividad(tdid,tdnombre);
    });

        function AgregarActividad(tdid, tdnombre) {
            var id = tdid.innerText;
            var nombre = tdnombre.innerText;
            var tr = $('<tr/>',{});
            var td1 = $('<td/>',{});
            var td2 = $('<td/>',{});
            var td3 = $('<td/>',{});
            var inputid = $('<input/>',{'type':'hidden','name':'ids[]','value':id});
            var inputnombre = $('<input/>',{'type':'hidden','name':'nombres[]','value':nombre});
            var inputorden = $('<input/>',{'type':'hidden','name':'ordenes[]','value':++orden})
            td1.text(id);
            td2.text(nombre);
            td3.text(orden);
            td1.append(inputid);
            td2.append(inputnombre);
            td3.append(inputorden);
            tr.append(td1);
            tr.append(td2);
            tr.append(td3);
            $('#detalleActividades').append(tr);
            $('#myModal').modal('hide');
        }
    </script>
@endsection