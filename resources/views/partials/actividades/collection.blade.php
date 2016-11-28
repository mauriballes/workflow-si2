<table class="table table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Departamento Encargado</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($actividades as $actividad)
        <tr class="clickable">
            <td>{{ $actividad->id }}</td>
            <td>{{ $actividad->nombre }}</td>
            <td>{{ $actividad->descripcion }}</td>
            <td>{{ $actividad->departamento->nombre}}</td>
            <td> {!! link_to('actividades/' . $actividad->id, 'Ver') !!} </td>
            <td> {!! link_to('actividades/' . $actividad->id . '/editar', 'Editar') !!} </td>
            <td>{!! Form::open(['url' => 'actividades/' . $actividad->id])!!}
                {!! Form::hidden('_method','DELETE') !!}
                <button class="btn" type="submit"><span class="glyphicon glyphicon-remove"></span></button>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>