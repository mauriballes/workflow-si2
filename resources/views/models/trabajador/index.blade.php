@extends('layout.principal')
@section('title')
    Trabajadores
@endsection
@section('content')
    <h1>Tareas Disponibles</h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Tramite</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody id="historiales">
        @section('historiales')
            @foreach($historiales as $historial)
                <tr class="alert-{{$historial->estado->color}}">
                    <td>{{ $historial->tramite->descripcion }}</td>
                    <td>{{ $historial->descripcion }}</td>
                    <td>{!! Form::open(['url' => 'trabajadores/' . $historial->id,'method'=>'PUT'])!!}
                        <button class="btn" type="submit"><span class="glyphicon glyphicon-bookmark">Realizar</span>
                        </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @show
        </tbody>
    </table>
@endsection

@section('scripts')
    <script>
        var ajaxHistoriales = setInterval(getHistoriales,2000);

        function getHistoriales() {
            $.ajax({
                url:'/trabajadores',
                //data,
                dataType:'JSON',
                success:function (res) {
                    $('#historiales').empty().html(res.historiales);
                    console.log(res);
                },
                error:function (err) {
                    console.error(err);
                },
                //complete,
                type:'GET'
            });
            //clearInterval(ajaxHistoriales);
        }
    </script>
@endsection