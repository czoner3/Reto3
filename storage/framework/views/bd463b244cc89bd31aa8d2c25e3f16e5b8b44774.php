<?php $__env->startSection('content'); ?>

    <form action="tecnico/<?php echo e($incidencia->id); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group2">

            <div class="form-group form-group-alpha">
                <h2>Datos Incidencia</h2>
                <div class="contenedor-cli-coche">
                    <div class="cliente-tecnico">
                        <div>
                            <label for="nombreCliente">Nombre de cliente:</label>
                            <input class="form-control" type="text" id="nombreCliente" name="nombreCliente"
                                   value="<?php echo e($cliente->nombrecli); ?>" disabled>
                        </div>

                        <div>
                            <label for="telefonoCliente">Telefono:</label>
                            <input class="form-control" type="text" id="telefonoCliente" name="telefonoCliente"
                                   value="<?php echo e($cliente->telefono); ?>" disabled>
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
                            <label for="matriculaCoche">Matrícula:</label>
                            <input class="form-control" type="text" id="matriculaCoche" name="matriculaCoche"
                                   value="<?php echo e($vehiculo->matricula); ?>" disabled>
                        </div>
                        <div>
                            <label for="marcaCoche">Marca:</label>
                            <input class="form-control" type="text" id="marcaCoche" name="marcaCoche"
                                   value="<?php echo e($vehiculo->marca); ?>" disabled>
                        </div>
                        <div>
                            <label for="modeloCoche">Modelo:</label>
                            <input class="form-control" type="text" id="modeloCoche" name="modeloCoche"
                                   value="<?php echo e($vehiculo->modelo); ?>" disabled>
                        </div>

                        <div>
                            <label for="aseguradoraCoche">Aseguradora:</label>
                            <input class="form-control" type="text" id="aseguradoraCoche" name="aseguradoraCoche"
                                   value="<?php echo e($vehiculo->aseguradora); ?>" disabled>
                        </div>
                        <div>
                            <label for="tiponicidencia">Tipo de incidencia:</label>
                            <input class="form-control" type="text" id="tiponicidencia" name="tiponicidencia"
                                   value=
                                <?php switch($incidencia->tipoincidencia):
                                   case (1): ?>
                                       'Pinchazo'
                                    <?php break; ?>
                                   <?php case (2): ?>
                                       'Golpe'
                                    <?php break; ?>
                                   <?php case (3): ?>
                                       'Averia'
                                    <?php break; ?>
                                   <?php case (4): ?>
                                       'Otro'
                                    <?php break; ?>
                                   <?php endswitch; ?> disabled>
                        </div>
                    </div>
                </div>
                <div class="contenedor-mapa">
                    <div class="mapa" id="map">
                    </div>
                </div>

            </div>
            <div class="botones-incidencia">
                <select class="custom-select" name="estado">
                    <option value="2">Resuelta en garaje</option>
                    <option value="3">Resuelta in situ</option>
                </select>
                <div class="resolver">
                    <input type="submit" class="btn btn-success btn-alpha" id="resultagaraje"
                           value="Resolver incidencia">
                </div>
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
                center: {lat: 42.8811127, lng: -2.5877665},
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
                    position: new google.maps.LatLng<?php echo e($incidencia->lugar); ?>,
                    type: 'marca',
                },
                {
                    position: new google.maps.LatLng<?php echo e($tecnico->localizacion); ?>,
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
            }
            ;

            calcRoute(features);

            function calcRoute(features) {
                var start = features[0].position;
                var end = features[1].position;
                var request = {
                    origin: start,
                    destination: end,
                    travelMode: 'DRIVING'
                };
                directionsService.route(request, function (result, status) {
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/tecnico.blade.php ENDPATH**/ ?>