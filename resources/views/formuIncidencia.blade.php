@extends('layout')

@section('content')


    <form action="/incidencia" method="POST">
        @csrf
    <div class="botones-incidencia">
            <button class="btn btn-1  btn-primary" type="submit" value="Generar incidencia">Generar incidencia</button>
            <button class="btn btn-3  btn-outline-secondary" type="submit" value="Volver" formmethod="get" formaction="/">Volver</button>
    </div>

            <div class="border border-secondary rounded-top contdni">
                <div class="campodni input-group mb-3">
                    <input type="text" class="form-control" placeholder="Dni del cliente" id="dniCliente" name="dniCliente" REQUIRED>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-secondary customed" id="botondni" name="action" value="Buscar dni" formaction=" ">Buscar dni</button>
                    </div>
                </div>
            </div>
        <div id="fichaIncidencia">
            <div id="fichaCliente">
                <div class="cliente border border-secondary">
                    <div>
                        <label for="nombre">Nombre:</label>
                        <input class="form-control" type="text" id="nombre" name="nombre" REQUIRED>
                    </div>
                    <div>
                        <label for="apellido">Apellido:</label>
                        <input class="form-control" type="text" id="apellido" name="apellido" REQUIRED>
                    </div>
                    <div>
                        <label for="direccion">Direccion:</label>
                        <input class="form-control" type="text" id="direccion" name="direccion" REQUIRED>
                    </div>
                    <div>
                        <label for="telefono">Telefono:</label>
                        <input class="form-control" type="text" id="telefono" name="telefono" REQUIRED>
                    </div>

                </div>
                <div class="coche border border-secondary">

                    <div class="matricula input-group mb-3">
                        <input type="text" class="form-control" placeholder="Matricula" id="matricula" name="matricula" REQUIRED>
                        <div class="input-group-append customed-div">
                            <button type="button" class="btn btn-outline-secondary customed2" id="botonmatricula" name="action" value="Buscar matricula" formaction=" ">Buscar matricula</button>
                        </div>
                    </div>


                    <div>
                        <label for="marca">Marca:</label>
                        <input class="form-control" type="text" id="marca" name="marca" REQUIRED>
                    </div>
                    <div>
                        <label for="modelo">Modelo:</label>
                        <input class="form-control" type="text" id="modelo" name="modelo" REQUIRED>
                    </div>
                    <div>
                        <label for="aseguradora">Aseguradora:</label>
                        <input class="form-control" type="text" id="aseguradora" name="aseguradora" REQUIRED>
                    </div>

                    <div>
                        <label for="tipovehiculo">Tipo de vehiculo:</label>
                        <select class="custom-select" id="tipovehiculo" name="tipovehiculo"  REQUIRED>
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
            <input type="hidden" name="idUsuario" id="idUsuario" value="{{$userid}}">
            <input type="hidden" name="idCliente" id="idCliente">
            <input type="hidden" name="insertClient" id="insertClient">
            <input type="hidden" name="insertVehicle" id="insertVehicle">
        </div>


        <div id="conttipo">
            <label for="tipoincidencia">Tipo de incidencia:</label>
            <select class="custom-select" name="tipoincidencia"  REQUIRED>
                <option value="1">pinchazo</option>
                <option value="2">golpe</option>
                <option value="3">averia</option>
                <option value="4">otro</option>
            </select>
        </div>

        <input id="pac-input" type="text" name="localizacion" class="buscador" placeholder=" ">
        <div class="mapaoperador" id="map"></div>

    </form>
    <script src="{{ asset('js/incidencias.js') }}"></script>



    <script>

        function initAutoscomplete() {
            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer();
            let mapOptions = {
                center: {lat: 42.8811127 ,lng: -2.5877665},
                zoom: 8
            }
            var map = new google.maps.Map(document.getElementById('map'), mapOptions);
            directionsRenderer.setMap(map);

            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };
                    var marker;
                    // Create a marker for each place.
                    marker = markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location

                    }));
                    let lugarIncidencia = {lat:places[0].geometry.location.lat(), lng:places[0].geometry.location.lng()};
                    console.log(lugarIncidencia);
                    let incidencia = ('(' + lugarIncidencia['lat'] + ',' + lugarIncidencia['lng'] + ')');

                    document.getElementById('lugar').value = incidencia;
                    var icons = {
                        info: {
                            icon: "https://img.icons8.com/ios-glyphs/30/000000/marker.png"
                        }
                    };

                    var features = [];
                    let tecnico;
                    @foreach($tecnicos as $tecnico)
                        tecnico ={
                        position: new google.maps.LatLng{{$tecnico->localizacion}},
                        type:"info",
                        title: "{{$tecnico->id}}"
                    };
                    features.push(tecnico);
                    @endforeach

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
                    }

                    function buscarTecnico(posicion,features){
                        for (var i = 0; i < features.length; i++) {
                            if(features[i].position == posicion){
                                let confirmar = confirm("¿Estas seguro de que quieres asignar este tecnico?");
                                if(confirmar==true) {
                                    document.getElementById('idTecnico').value = features[i].title;
                                    calcRoute(posicion, lugarIncidencia);
                                }
                            }

                        }
                    }
                    function calcRoute(tecnico,marker) {
                        var start = marker;
                        var end = tecnico;
                        var request = {
                            origin: start,
                            destination: end,
                            travelMode: 'DRIVING'
                        };
                        directionsService.route(request, function(result, status) {
                            if (status == 'OK') {
                                directionsRenderer.setDirections(result);
                            }
                        });
                    }

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });


                map.fitBounds(bounds);
            });
        }

    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQ1IlkRnZIO-tM5Z-OcVz2r6Pk7egLuTA&libraries=places"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQ1IlkRnZIO-tM5Z-OcVz2r6Pk7egLuTA&libraries=places&callback=initAutoscomplete"
            async defer></script>
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
            document.getElementById('tipovehiculo').value = '{$coche->tipo}';
        </script>";
    }
    ?>


@endsection
