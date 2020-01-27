@extends('layout')

@section('content')

    <div class="full-container">

        <div class="img">
            <div class="color-cortina">
            </div>
        </div>

        <form action="" method="GET">
            @csrf


            <div class="form-group2">

                <div class="form-group form-group-alpha">
                    <h2>Datos Incidencia</h2>
                    <div class="contenedor-cli-coche">
                        <div class="cliente-tecnico">
                            <div>
                                <label for="nombreCliente">Nombre de cliente:</label>
                                <input class="form-control" type="text" id="nombreCliente" name="nombreCliente" value="{{$cliente->nombrecli}}">
                            </div>

                            <div>
                                <label for="telefonoCliente">Telefono:</label>
                                <input class="form-control" type="text" id="telefonoCliente" name="telefonoCliente" value="{{$cliente->telefono}}">
                            </div>
                            <div class="observacion-tecnico">
                                <label for="observaciones">Observaciones:</label>
                                <textarea name="observaciones" id="observaciones" rows="5" cols="60"> </textarea>
                            </div>
                        </div>
                        <div>
                        </div>
                        <div class="coche-tecnico">
                            <div>
                                <label for="matriculaCoche">Matricula:</label>
                                <input class="form-control" type="text" id="matriculaCoche" name="matriculaCoche" value="{{$vehiculo->matricula}}">
                            </div>
                            <div>
                                <label for="marcaCoche">Marca:</label>
                                <input class="form-control" type="text" id="marcaCoche" name="marcaCoche" value="{{$vehiculo->marca}}">
                            </div>
                            <div>
                                <label for="modeloCoche">Modelo:</label>
                                <input class="form-control" type="text" id="modeloCoche" name="modeloCoche" value="{{$vehiculo->modelo}}">
                            </div>

                            <div>
                                <label for="aseguradoraCoche">Aseguradora:</label>
                                <input class="form-control" type="text" id="aseguradoraCoche" name="aseguradoraCoche" value="{{$vehiculo->aseguradora}}">
                            </div>
                            <div>
                                <label for="tiponicidencia">Tipo de incidencia:</label>
                                <input class="form-control" type="text" id="tiponicidencia" name="tiponicidencia" value="{{$incidencia->tipoincidencia}}">
                            </div>
                        </div>
                    </div>
                    <div class="contenedor-mapa">
                        <div class="mapa" id="map">
                        </div>
                    </div>

                </div>
                <div class="boton-tecnico">
                    <button type="button" class="btn btn-success btn-alpha" id="resultagaraje" name="action" value="2" formaction=" ">Resuelta Garaje</button>
                    <button type="button" class="btn btn-success btn-alpha" id="resultainsitu" name="action" value="3" formaction=" ">Resuelta insitu</button>

                </div>
                <div class="volver">
                    <a class="btn btn-primary btn-alpha" href="http://homestead.test/">volver</a>
                </div>
            </div>



        </form>

    </div>
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
                marca: {
                    icon: "https://img.icons8.com/material/24/000000/circled-x.png"
                }
            };

            var features = [
                {
                    position: new google.maps.LatLng{{$incidencia->lugar}},
                    type: 'marca',
                },
                {
                    position: new google.maps.LatLng{{$tecnico->localizacion}},
                    type: 'marca',
                }
            ];
            var locations;

            for (var i = 0; i < features.length; i++) {
                locations = new google.maps.Marker({
                    position: features[i].position,
                    icon: icons[features[i].type].icon,
                    map: map
                });
            };

            calcRoute(features);

            function calcRoute(features) {
                var start = features[0].position;
                var end = features[1].position;
                var request = {
                    origin: start,
                    destination: end,
                    travelMode: 'DRIVING'
                };
                directionsService.route(request, function(result, status) {
                    if (status == 'OK') {
                        directionsRenderer.setDirections(result);
                        locations.setMap(null);

                    }
                });
            }


        }




    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQ1IlkRnZIO-tM5Z-OcVz2r6Pk7egLuTA&callback=initMap"
            async defer></script>


    <?php
    if (isset($_GET['action'])) {
        if($_GET['action'] !=""){
            $action  = $_GET['action'];
            echo "sjsjsjsjsjsj";
        }
    }

    ?>
@endsection
