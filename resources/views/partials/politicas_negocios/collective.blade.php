<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    @foreach($politicas_negocios as $politica_negocio)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading{{$politica_negocio->id}}">
                <div class="row">
                    <div class="col-md-10 col-sm-10 col-lg-10">
                        {{$politica_negocio->nombre}}
                    </div>
                    <div class="col-md-2 col-sm-2 col-lg-2">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                           href="#collapse{{$politica_negocio->id}}"
                           aria-expanded="false" aria-controls="collapse{{$politica_negocio->id}}">
                            Actividades
                        </a>
                    </div>
                </div>
            </div>
            <div id="collapse{{$politica_negocio->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$politica_negocio->id}}">
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($politica_negocio->actividades as $actividad)
                            <tr>
                                <td>{{$actividad->id}}</td>
                                <td>{{$actividad->nombre}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
</div>