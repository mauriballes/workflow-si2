<table class="table table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($departamentos as $departamento)
        <tr>
            <td>{{ $departamento->id }}</td>
            <td>{{ $departamento->nombre }}</td>
            <td>{{ $departamento->descripcion }}</td>
            <td> {!! link_to('departamentos/' . $departamento->id, 'Ver') !!} </td>
            <td> {!! link_to('departamentos/' . $departamento->id . '/editar', 'Editar') !!} </td>
            <td>{!! Form::open(['url' => 'departamentos/' . $departamento->id])!!}
                {!! Form::hidden('_method','DELETE') !!}
                <button class="btn" type="submit"><span class="glyphicon glyphicon-remove"></span></button>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>