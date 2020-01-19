@extends('layout')

@section('content')

    <h1>Registro incidencia</h1>
    <form action=" " method="POST">
        @csrf
        <div>
            <h2>Ficha Cliente</h2>
            <div class="border border-secondary rounded-top" style=" width: 90%;margin-left: 5%;">
                <div class="input-group mb-3" style="width: 30%;margin-left: 69%;margin-top: 1%;">
                    <input type="text" class="form-control" placeholder="Dni del cliente" id="dniCliente" name="dniCliente">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="botondni" onclick="mostrarFicha()">Buscar</button>
                    </div>
                </div>
            </div>

            <div id="fichaCliente" style="display: none; width: 90%;margin-left: 5%;">
                <div class="cliente border border-secondary" class="form-group" style="width: 50%;float: left;padding: 10px">
                    <div style=" width: 90%;">
                        <label for="nombre">Nombre:</label>
                        <input class="form-control" type="text" id="nombre" name="nombre">
                    </div>
                    <div style=" width: 90%;">
                        <label for="apellido">Apellido:</label>
                        <input class="form-control" type="text" id="apellido" name="apellido">
                    </div>
                    <div style=" width: 90%;">
                        <label for="direccion">Direccion:</label>
                        <input class="form-control" type="text" id="direccion" name="direccion">
                    </div>
                    <div style=" width: 90%;">
                        <label for="telefono">Telefono:</label>
                        <input class="form-control" type="text" id="telefono" name="telefono">
                    </div>

                </div>
                <div class="coche border border-secondary" style="width: 50%;float: left;">
                    <div style=" width: 90%;">
                        <label for="matricula">Matricula:</label>
                        <input class="form-control" type="text" id="matricula" name="matricula">
                    </div>
                    <div style=" width: 90%;">
                        <label for="marca">Marca:</label>
                        <input class="form-control" type="text" id="marca" name="marca">
                    </div>
                    <div style=" width: 90%;">
                        <label for="modelo">Modelo:</label>
                        <input class="form-control" type="text" id="modelo" name="modelo">
                    </div>
                    <div style=" width: 90%;">
                        <label for="aseguradora">Aseguradora:</label>
                        <input class="form-control" type="text" id="aseguradora" name="aseguradora">
                    </div>
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
            <input class="btn btn-primary" type="submit" value="Generar incidencia">
        </div>
    </form>
    <a href="http://homestead.test/">volver</a>
    <script>
        function mostrarFicha(){
            let fichaCliente = document.getElementById("fichaCliente");
            fichaCliente.style.display="block";
            fichaCliente.style.transitionDelay="3s";

        }
    </script>

@endsection

