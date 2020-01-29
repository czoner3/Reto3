@extends('layout')

@section('content')

<table class="table">
    <thead class="thead-dark">
    <tr>
        <th>Tipo de incidencia</th>
        <th>Localizacion</th>
        <th>Estado</th>
        <th>Cliente</th>
        <th>Cliente nombre</th>
        <th>Operador</th>
        <th>Observaciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($misincidencias as $incidencia)
        <tr>
            <td>{{$incidencia->tipoincidencia}}</td>
            <td>{{$incidencia->lugar}}</td>
            <td> @switch($incidencia->estado)
                    @case(1)
                    Abierta
                    @break
                    @case(2)
                    Cerrada en garaje
                    @break
                    @case(3)
                    Cerrada insitu
                    @break
                @endswitch
            </td>
            <td>
                {{$incidencia->cliente_id}}
            </td>
            <td>
                {{ \App\Cliente::find($incidencia->cliente_id)->nombrecli}}
            </td>
            <td>
                {{\App\Users::find($incidencia->usuario_id)->nombreusu}}
            </td>
            <td>{{$incidencia->observaciones}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
