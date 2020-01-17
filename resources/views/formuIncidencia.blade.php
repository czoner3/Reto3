@extends('layout')

@section('content')

    <h1>Registro incidencia</h1>
    <form action=" " method="POST">
        @csrf
        <div>
            <h2>Ficha Cliente</h2>
            <div>
                <label for="dniCliente">Name:</label>
                <input type="text" id="dniCliente" name="dniCliente">
            </div>

            <div class="cliente" class="form-group" style="width: 50%;float: left;">
                <div>
                    <label for="nombre">Nombre:</label>
                    <input class="form-control" type="text" id="nombre" name="nombre">
                </div>
                <div>
                    <label for="apellido">Apellido:</label>
                    <input class="form-control" type="text" id="apellido" name="apellido">
                </div>
                <div>
                    <label for="direccion">Direccion:</label>
                    <input class="form-control" type="text" id="direccion" name="direccion">
                </div>
                <div>
                    <label for="telefono">Telefono:</label>
                    <input class="form-control" type="text" id="telefono" name="telefono">
                </div>

            </div>
            <div class="coche" style="width: 50%;float: left;">
                <div>
                    <label for="matricula">Matricula:</label>
                    <input class="form-control" type="text" id="matricula" name="matricula">
                </div>
                <div>
                    <label for="marca">Marca:</label>
                    <input class="form-control" type="text" id="marca" name="marca">
                </div>
                <div>
                    <label for="modelo">Modelo:</label>
                    <input class="form-control" type="text" id="modelo" name="modelo">
                </div>
                <div>
                    <label for="aseguradora">Aseguradora:</label>
                    <input class="form-control" type="text" id="aseguradora" name="aseguradora">
                </div>
            </div>
        </div>


        <div>
            <label for="tipoincidencia">Tipo de incidencia:</label>
            <select class="custom-select">
                <option name="tipoincidencia" value="1">averia</option>
                <option name="tipoincidencia" value="2">pinchazo</option>
                <option name="tipoincidencia" value="3">golpe</option>
                <option name="tipoincidencia" value="4">otro</option>

            </select>
        </div>

        <div>
            <input type="submit" value="Generar incidencia">
        </div>
    </form>
    <a href="http://homestead.test/">volver</a>


@endsection

