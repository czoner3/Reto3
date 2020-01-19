@extends('layout')

@section('content')
<div class="row col-11"><h1>Gestion de bodegas</h1></div>
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
            <label for="cliente">Cliente:</label>
            <input class="form-control" type="text" id="cliente" name="cliente">
        </div>
        <div>
            <label for="operador">Operador:</label>
            <input class="form-control" type="text" id="operador" name="operador">
        </div>
        <div>
            <label for="tecnico">Tecnico:</label>
            <input class="form-control" type="text" id="tecnico" name="tecnico">
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
            <th>Operador</th>
            <th>Tecnico</th>
        </tr>
        </thead>
        <tbody>
        @foreach($incidencia as $inci)
            <tr>
                <td>{{$inci->tipoincidencia }}</td>
                <td>{{$inci->lugar }}</td>
                <td>{{$inci->observaciones}}</td>
                <td>{{$inci->estado}}</td>
                <td>{{$inci->Cliente_id}}</td>
                <td>{{$inci->Usuario_id}}</td>
                <td>{{$inci->Tecnico_id}}</td>
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