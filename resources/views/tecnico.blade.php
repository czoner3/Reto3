@extends('layout')

@section('content')

    <div class="full-container">

        <div class="img">
            <div class="color-cortina">
            </div>
        </div>

    <form  action="" method="GET">
        @csrf


        <div class="form-group2">

            <div class="form-group form-group-alpha">
                <h2>Datos Incidencia</h2>
              <div class="contenedor-cli-coche">
                <div class="cliente-tecnico">
                    <div>
                       <label for="nombreCliente">Nombre de cliente:</label>
                       <input class="form-control" type="text" id="nombreCliente" name="nombreCliente">
                  </div>

                <div>
                    <label for="telefonoCliente">Telefono:</label>
                    <input class="form-control" type="text" id="telefonoCliente" name="telefonoCliente">
                </div>
                </div>
                <div class="coche-tecnico">
                <div>
                    <label for="matriculaCoche">Matricula:</label>
                    <input class="form-control" type="text" id="matriculaCoche" name="matriculaCoche">
                </div>
                <div>
                    <label for="marcaCoche">Marca:</label>
                    <input class="form-control" type="text" id="marcaCoche" name="marcaCoche">
                </div>
                <div>
                    <label for="modeloCoche">Modelo:</label>
                    <input class="form-control" type="text" id="modeloCoche" name="modeloCoche">
                </div>

                <div>
                    <label for="aseguradoraCoche">Aseguradora:</label>
                    <input class="form-control" type="text" id="aseguradoraCoche" name="aseguradoraCoche">
                </div>
                </div>
              </div>
                <div class="contenedor-mapa">
                    <div class="mapa" id="map">
                    </div>
                </div>

            </div>
            <div class="boton-tecnico">
                <input class="btn btn-success btn-alpha" type="submit" value="Resuelta garaje">
                <input class="btn btn-success btn-alpha" type="submit" value="Resuelta insitu">
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
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 42.8811127 ,lng: -2.5877665},
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

            var features = [
                {
                    position: new google.maps.LatLng(42.8811127, -2.5877665),
                    type: 'info',
                    title: "idguay"
                }
            ];

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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQ1IlkRnZIO-tM5Z-OcVz2r6Pk7egLuTA&callback=initMap"
            async defer></script>

@endsection
