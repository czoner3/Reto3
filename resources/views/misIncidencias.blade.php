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
        <th>Usuario</th>
        <th>Usuario nombre</th>
        <th>Tecnico</th>
        <th>Tecnico nombre</th>
        <th>Observaciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($misincidencias as $incidencia)
        <tr>
            <td>{{$incidencia->tipoincidencia}}</td>
            <td>{{$incidencia->lugar}}</td>
            <td>{{($incidencia->estado)?'Abierta':'Cerrada'}}</td>
            <td>
                {{$incidencia->cliente_id}}
            </td>
            <td>
                {{ \App\Cliente::find($incidencia->cliente_id)->nombrecli}}
            </td>
            <td>
                {{$incidencia->usuario_id}}
            </td>
            <td>
                {{\App\Users::find($incidencia->usuario_id)->nombreusu}}
            </td>
            <td>
                {{$incidencia->tecnico_id}}
            </td>
            <td>
                {{\App\Tecnico::find($incidencia->tecnico_id)->nombre}}
            </td>
            <td>{{$incidencia->observaciones}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
