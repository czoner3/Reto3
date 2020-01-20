@extends('layout')

@section('content')

    <h1>Registro incidencia</h1>
    <form action="homestead.test" method="GET">
        @csrf
        <div>
            <h2>Ficha Cliente</h2>
            <div class="border border-secondary rounded-top" style=" width: 90%;margin-left: 5%;">
                <div class="input-group mb-3" style="width: 30%;margin-left: 69%;margin-top: 1%;">
                    <input type="text" class="form-control" placeholder="Dni del cliente" id="dniCliente" name="dniCliente">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-secondary" id="botondni" name="action" value="Buscar dni" formaction=" ">Buscar dni</button>
                    </div>
                </div>
            </div>

            <div id="fichaCliente" style="width: 90%;margin-left: 5%;">
                <div class="cliente border border-secondary" class="form-group" style="width: 50%;float: left;padding: 10px;">
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
                <div class="coche border border-secondary" style="width: 50%;float: left;padding: 10px;">

                        <div class="input-group mb-3" style="margin-top: 32px;height: 22px;">
                            <input type="text" class="form-control" placeholder="Matricula" id="matricula" name="matricula">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-outline-secondary" id="botondni" name="action" value="Buscar matricula" formaction=" ">Buscar matricula</button>
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

        <div id="map" style="width: 90%;height: 30%;margin-left: 5%;border: 2px solid lightblue;border-radius: 10px;"></div>

        <div>
            <button class="btn btn-primary" type="submit" name="action" value="Generar incidencia">Generar incidencia</button>
        </div>
    </form>


    <a href="http://homestead.test/">volver</a>
    <script>
        let map;


        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 43.1 ,lng: -2.5877665},
                zoom: 9
            });






            var iconBase =
                'https://developers.google.com/maps/documentation/javascript/examples/full/images/';


            var icons = {
                parking: {
                    icon: iconBase + 'parking_lot_maps.png'
                },
                library: {
                    icon: iconBase + 'library_maps.png'
                },
                info: {
                    icon: iconBase + 'info-i_maps.png'
                }
            };

            var features = [];
            let tecnico;
            @foreach($tecnicos as $tecnico)
                tecnico ={
                    position: new google.maps.LatLng({{$tecnico->localizacion}}),
                    type: 'info',
                    title: "{{$tecnico->id}}"
                }
                features.push(tecnico);
            @endforeach

            for (var i = 0; i < features.length; i++) {
                var locations = new google.maps.Marker({
                    position: features[i].position,
                    icon: icons[features[i].type].icon,
                    title: features[i].title,
                    map: map
                });
                google.maps.event.addDomListener(locations, 'click', function() {
                    alert(locations.title);
                });
            };

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
            });


        }


    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQ1IlkRnZIO-tM5Z-OcVz2r6Pk7egLuTA&callback=initMap"async defer></script>

    <?php
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    }
    switch ($action){
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


        echo "<script>
            document.getElementById('nombre').value = '{$cliente->nombre}';
            document.getElementById('apellido').value = '{$cliente->apellido}';
            document.getElementById('direccion').value = '{$cliente->direccion}';
            document.getElementById('telefono').value = '{$cliente->telefono}';
        </script>";
    }
    function buscarCoche($matricula){

        $cocheid =\App\Vehiculo::select('id')->where('matricula',$matricula)->first();
        $coche = \App\Vehiculo::find($cocheid->id);

        echo "<script>
            document.getElementById('marca').value = '{$coche->marca}';
            document.getElementById('modelo').value = '{$coche->modelo}';
            document.getElementById('aseguradora').value = '{$coche->aseguradora}';
        </script>";
        }
    ?>


@endsection

