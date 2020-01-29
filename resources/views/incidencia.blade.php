@extends('layout')

@section('content')

<div class="row col-11"><h1>Incidencias</h1></div>

<div class="row col-11">
    <form action="/incidencia" method="get">
    <div class="incidencia" class="form-group" style="width: 50%;float: left;">
        <div>
            <label for="tipoincidencia">Tipo de incidencia:</label>
            <select class="custom-select" name="tipoincidencia">
                <option value="">--</option>
                <option value="1">Pinchazo</option>
                <option value="2">Golpe</option>
                <option value="3">Averia</option>
                <option value="4">Otro</option>
            </select>
            {{--<input class="form-control" type="text" id="tipoincidencia" name="tipoincidencia">--}}
        </div>
        <div>
            <label for="estado">Estado:</label>
            <select class="custom-select" name="estado">
                <option value="">--</option>
                <option value="1">Abierta</option>
                <option value="2">Cerrada garaje</option>
                <option value="3">Cerrada insitu</option>

            </select>
            {{--<input class="form-control" type="text" id="estado" name="estado">--}}
        </div>
        <div>
            <label for="cliente_id">Cliente:</label>
            <select class="custom-select" name="cliente_id">
                <option value="">--</option>
                @foreach($clientes as $cliente)
                <option value="{{$cliente->id}}">{{$cliente->nombrecli}}</option>
                @endforeach
            </select>
            {{--<input class="form-control" type="text" id="cliente_id" name="cliente_id">--}}
        </div>
        <div>
            <label for="usuario_id">Operador:</label>
            <select class="custom-select" name="usuario_id">
                <option value="">--</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->nombreusu}}</option>
                @endforeach
            </select>
            {{--<input class="form-control" type="text" id="usuario_id" name="usuario_id">--}}
        </div>
        <div>
            <label for="tecnico_id">Tecnico:</label>
            <select class="custom-select" name="tecnico_id">
                <option value="">--</option>
                @foreach($tecnicos as $tecnico)
                    <option value="{{$tecnico->id}}">{{$tecnico->nombre}}</option>
                @endforeach
            </select>
            {{--<input class="form-control" type="text" id="tecnico_id" name="tecnico_id">--}}
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
        @foreach($incidencia as $inci)
            <tr>
                <td>
                    @switch($inci->tipoincidencia)
                        @case(1)
                        Pinchazo
                        @break
                        @case(2)
                        Golpe
                        @break
                        @case(3)
                        Averia
                        @break
                        @case(4)
                        Otro
                        @break
                    @endswitch

                </td>
                <td>{{$inci->lugar }}</td>
                <td>
                    @switch($inci->estado)
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
                    {{$inci->cliente_id}}
                </td>
                <td>
                    {{ \App\Cliente::find($inci->cliente_id)->nombrecli}}
                </td>
                <td>
                    {{$inci->usuario_id}}
                </td>
                <td>
                    {{\App\Users::find($inci->usuario_id)->nombreusu}}
                </td>
                <td>
                    {{$inci->tecnico_id}}
                </td>
                <td>
                    {{\App\Tecnico::find($inci->tecnico_id)->nombre}}
                </td>
                <td>{{$inci->observaciones}}</td>
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
