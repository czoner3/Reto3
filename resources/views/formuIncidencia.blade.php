@extends('layout')

@section('content')

    <h1>Registro articulo</h1>
    <form action=" " method="POST">
        @csrf
        <div>
            <div>
                <label for="dniCliente">Name:</label>
                <input type="text" id="dniCliente" name="dniCliente">
            </div>

            <div class="cliente" style="width: 50%;float: left;">
                <div>
                    <label for="nombre">Name:</label>
                    <input type="text" id="nombre" name="nombre">
                </div>
                <div>
                    <label for="apellido">Name:</label>
                    <input type="text" id="apellido" name="apellido">
                </div>
                <div>
                    <label for="direccion">Name:</label>
                    <input type="text" id="direccion" name="direccion">
                </div>
                <div>
                    <label for="telefono">Name:</label>
                    <input type="text" id="telefono" name="telefono">
                </div>

            </div>
            <div class="coche" style="width: 50%;float: left;">
                <div>
                    <label for="matricula">Name:</label>
                    <input type="text" id="matricula" name="matricula">
                </div>
                <div>
                    <label for="marca">Name:</label>
                    <input type="text" id="marca" name="marca">
                </div>
                <div>
                    <label for="modelo">Name:</label>
                    <input type="text" id="modelo" name="modelo">
                </div>
                <div>
                    <label for="aseguradora">Name:</label>
                    <input type="text" id="aseguradora" name="aseguradora">
                </div>
            </div>
        </div>


        <div>
            <label for="tipoincidencia">Name:</label>
            <input type="text" id="tipoincidencia" name="tipoincidencia">
        </div>

        <div>
            <input type="submit" value="Generar incidencia">
        </div>
    </form>
    <a href="http://homestead.test/">volver</a>


@endsection

