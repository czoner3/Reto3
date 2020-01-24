@extends('layout')

@section('content')

    <section id="nav-test">
        <div id="nav-container">
            <ul>
                <li class="nav-li active-nav"><a href="/home">Home</a></li>
                <li class="nav-li"><a href="/create/incidencia">Generar incidencia</a></li>
            </ul>
            <div id="line"></div>
        </div>
    </section>
    <form action="/incidencia" method="POST">
        @csrf


            <button class="btn btn-primary" type="submit" value="Generar incidencia" style="margin:10px 0 1% 87.5%;">Generar incidencia</button>

            <div class="border border-secondary rounded-top" style=" width: 90%;margin-left: 5%;">
                <div class="input-group mb-3" style="width: 30%;margin-left: 69%;margin-top: 1%;">
                    <input type="text" class="form-control" placeholder="Dni del cliente" id="dniCliente" name="dniCliente">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-secondary" id="botondni" name="action" value="Buscar dni" formaction=" ">Buscar dni</button>
                    </div>
                </div>
            </div>
        <div id="fichaIncidencia" style="height: 0px;overflow: hidden">
            <div id="fichaCliente" style="width: 90%;margin-left: 5%;">
                <div class="cliente border border-secondary" class="form-group" style="width: 50%;float: left;padding: 45px 10px 45px 10px;border-bottom-left-radius: 1%;">
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
                <div class="coche border border-secondary" style="width: 50%;float: left;padding: 2px 10px 18px 10px;border-bottom-right-radius: 1%;">

                    <div class="input-group mb-3" style="margin-top: 32px;height: 22px;">
                        <input type="text" class="form-control" placeholder="Matricula" id="matricula" name="matricula">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" id="botonmatricula" name="action" value="Buscar matricula" formaction=" ">Buscar matricula</button>
                        </div>
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

                    <div>
                        <label for="tipovehiculo">Tipo de vehiculo:</label>
                        <select class="custom-select" name="tipovehiculo">
                            <option value="1">Vehículos ligeros</option>
                            <option value="2">Vehículos pesados </option>
                            <option value="3">Vehículos especiales y agrícolas</option>
                            <option value="4">Otros vehículos</option>
                        </select>
                    </div>
                </div>
            </div>
            <input type="hidden" name="idTecnico" id="idTecnico">
            <input type="hidden" name="estado" id="estado" value="1">
            <input type="hidden" name="lugar" id="lugar">
            <input type="hidden" name="idUsuario" id="idUsuario" value="1">
            <input type="hidden" name="idCliente" id="idCliente">
            <input type="hidden" name="insertClient" id="insertClient">
            <input type="hidden" name="insertVehicle" id="insertVehicle">
        </div>


        <div style=" width: 90%;margin: 2px 0 2% 5%;">
            <label for="tipoincidencia">Tipo de incidencia:</label>
            <select class="custom-select" name="tipoincidencia">
                <option value="1">pinchazo</option>
                <option value="2">golpe</option>
                <option value="3">averia</option>
                <option value="4">otro</option>
            </select>
        </div>

        <div id="map" style="width: 90%;height: 30%;margin: 0 0 1.3% 5%;border: 2px solid lightblue;border-radius: 10px;"></div>

    </form>



    <script>
        let botondni = document.getElementById('botondni');

        botondni.addEventListener("click", function () {

            document.getElementById('fichaIncidencia').style.height="414px";
            document.getElementById('fichaIncidencia').style.transitionDelay="1s";
            document.getElementById('fichaIncidencia').style.transitionDuration="1.5s";

            let dnicliente = document.getElementById('dniCliente').value;

            $.ajax({
                data: dnicliente,
                url: "/create/incidencia?_token=KjSunNIDQC8HoHZt3Oayt3rB7mS5JV0mNVbrplb4&dniCliente="+ dnicliente +"&action=Buscar+dni",
                type: "GET",
                async: false,
                success: function (result) {
                    let contenido = $("<div />").html(result).find( '#jscliente' ).html();
                    eval(contenido);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(thrownError);
                }
            });
        });


        let botonmatricula = document.getElementById('botonmatricula');

        botonmatricula.addEventListener("click", function () {
            let nummatricula = document.getElementById('matricula').value;
            $.ajax({
                data: nummatricula,
                url: "http://homestead.test/create/incidencia?_token=KjSunNIDQC8HoHZt3Oayt3rB7mS5JV0mNVbrplb4&matricula="+ nummatricula +"&action=Buscar+matricula",
                type: "GET",
                async: false,
                success: function (result) {
                    let contenido = $("<div />").html(result).find( '#jscoche' ).html();
                    eval(contenido);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(thrownError);
                }
            });
        });


    </script>
    <script>



        let map;

        function initMap() {
            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer();
            let mapOptions = {
                center: {lat: 42.8811127 ,lng: -2.5877665},
                zoom: 8
            }
            var map = new google.maps.Map(document.getElementById('map'), mapOptions);
            directionsRenderer.setMap(map);



            var icons = {
                info: {
                    icon: "https://img.icons8.com/ios-glyphs/30/000000/marker.png"
                }
            };

            var features = [];
            let tecnico;
            @foreach($tecnicos as $tecnico)
                tecnico ={
                position: new google.maps.LatLng({{$tecnico->localizacion}}),
                type:"info",
                title: "{{$tecnico->id}}"
            }
            features.push(tecnico);
                @endforeach



            var marker;

            function placeMarker(location) {
                if ( marker ) {
                    marker.setPosition(location);
                } else {
                    marker = new google.maps.Marker({
                        position: location,
                        map: map
                    })
                    ;
                }
            }
            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
                document.getElementById('lugar').value = event.latLng;

            });

            var locations;
            for (var i = 0; i < features.length; i++) {
                     locations = new google.maps.Marker({
                    position: features[i].position,
                    icon: icons[features[i].type].icon,
                    title: features[i].title,
                    map: map
                });
                google.maps.event.addDomListener(locations, 'click', function(event) {
                    let posicion = event.latLng;
                    buscarTecnico(posicion,features);
                });
            };
            google.maps.event.addDomListener(locations, 'click', function() {
                let confirmar = confirm("¿Estas seguro de que quieres asignar este tecnico?");
                if(confirmar){
                    document.getElementById('idTecnico').value = locations.title;
                    calcRoute(locations.position,marker);
                }

            function buscarTecnico(posicion,features){
                for (var i = 0; i < features.length; i++) {
                    if(features[i].position == posicion){
                        let confirmar = confirm("¿Estas seguro de que quieres asignar este tecnico?");
                        if(confirmar){
                            document.getElementById('idTecnico').value = features[i].title;
                            calcRoute(posicion,marker);
                        }
                    }

                }
            }
            function calcRoute(tecnico,marker) {
                var start = marker.position;
                var end = tecnico;
                var request = {
                    origin: start,
                    destination: end,
                    travelMode: 'DRIVING'
                };
                directionsService.route(request, function(result, status) {
                    if (status == 'OK') {
                        directionsRenderer.setDirections(result);
                        marker.setMap(null);
                        locations.setMap(null);
                    }
                });
            }

        }


    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQ1IlkRnZIO-tM5Z-OcVz2r6Pk7egLuTA&callback=initMap"async defer></script>

    <?php
    if (isset($_GET['action'])) {
        if($_GET['action'] !=""){
            $action  = $_GET['action'];
        }

    }
    switch ($action ?? ''){
        case "Buscar dni":
            if(isset($_GET["dniCliente"])){
                $dnicliente = $_GET["dniCliente"];

                if($dnicliente !=""){
                    buscardatos($dnicliente);
                }
            }
            break;
        case "Buscar matricula":
            if(isset($_GET["matricula"])){
                $matricula = $_GET["matricula"];

                if($matricula !=""){
                    buscarcoche($matricula);
                }
            }
    }

    function buscardatos($dnicliente){
        $clienteid =\App\Cliente::select('id')->where('dni',$dnicliente)->first();
        $cliente = \App\Cliente::find($clienteid->id);


        echo "<script id='jscliente'>
            document.getElementById('insertClient').value = 1;
            document.getElementById('idCliente').value = '{$cliente->id}';
            document.getElementById('nombre').value = '{$cliente->nombrecli}';
            document.getElementById('apellido').value = '{$cliente->apellido}';
            document.getElementById('direccion').value = '{$cliente->direccion}';
            document.getElementById('telefono').value = '{$cliente->telefono}';
        </script>";
    }
    function buscarCoche($matricula){

        $cocheid =\App\Vehiculo::select('id')->where('matricula',$matricula)->first();
        $coche = \App\Vehiculo::find($cocheid->id);

        echo "<script id='jscoche'>
            document.getElementById('insertVehicle').value = 1;
            document.getElementById('marca').value = '{$coche->marca}';
            document.getElementById('modelo').value = '{$coche->modelo}';
            document.getElementById('aseguradora').value = '{$coche->aseguradora}';
        </script>";
    }
    ?>


@endsection
