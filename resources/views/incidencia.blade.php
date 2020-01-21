@extends('layout')

@section('content')
<div class="row col-11"><h1>Incidencias</h1></div>
<div class="row col-11">
    <form action="/incidencia" method="get">
    <div class="incidencia" class="form-group" style="width: 50%;float: left;">
        <div>
            <label for="tipoincidencia">Tipo de incidencia:</label>
            <input class="form-control" type="text" id="tipoincidencia" name="tipoincidencia">
        </div>
        <div>
            <label for="estado">Estado:</label>
            <input class="form-control" type="text" id="estado" name="estado">
        </div>
        <div>
            <label for="cliente_id">Cliente:</label>
            <input class="form-control" type="text" id="cliente_id" name="cliente_id">
        </div>
        <div>
            <label for="usuario_id">Operador:</label>
            <input class="form-control" type="text" id="usuario_id" name="usuario_id">
        </div>
        <div>
            <label for="tecnico_id">Tecnico:</label>
            <input class="form-control" type="text" id="tecnico_id" name="tecnico_id">
        </div>
        <div class="row mb-3">
            <input class=" btn btn-primary mr" type="submit" value="Filtrar">
        </div>
    </div>
    </form>
</div>

<div class="row col-11">
    <table class="table " border="1">
        <thead class="thead-dark ">
        <tr>
            <th>Tipo de incidencia</th>
            <th>Localizacion</th>
            <th>Observaciones</th>
            <th>Estado</th>
            <th>Cliente</th>
            <th>Cliente nombre</th>
            <th>Usuario</th>
            <th>Usuario nombre</th>
            <th>Tecnico</th>
            <th>Tecnico nombre</th>

        </tr>
        </thead>
        <tbody>
        @foreach($incidencia as $inci)
            <tr>
                <td>
                    @switch($inci->tipoincidencia)
                        @case(0)
                        Pinchazo
                        @break
                        @case(1)
                        Golpe
                        @break
                        @case(2)
                        Averia
                        @break
                        @case(3)
                        Otro
                        @break
                    @endswitch

                </td>
                <td>{{$inci->lugar }}</td>
                <td>{{$inci->observaciones}}</td>
                <td>{{($inci->estado)?'Yes':'No'}}</td>
                <td>
                    {{$inci->Cliente_id}}
                </td>
                <td>
                    {{ \App\Cliente::find($inci->Cliente_id)->nombrecli}}
                </td>
                <td>
                    {{$inci->Usuario_id}}
                </td>
                <td>
                    {{\App\Users::find($inci->Usuario_id)->nombreusu}}
                </td>
                <td>
                    {{$inci->Tecnico_id}}
                </td>
                <td>
                    {{\App\Tecnico::find($inci->Tecnico_id)->nombretec}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection




<?php
/**
 * Created by PhpStorm.
 * User: msimm
 * Date: 17/01/2020
 * Time: 11:52
 */
?>