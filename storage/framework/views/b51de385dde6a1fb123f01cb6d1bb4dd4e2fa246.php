<?php $__env->startSection('content'); ?>

    <div class="container-register">

        <div class="row justify-content-center justify-content-center-register">

             <div class="col-md-12 regInput">
                <div class="card">
                    <div class="card-header" id="card-header-register"><?php echo e(__('Register')); ?></div>

                    <div class="card-body" id="card-body-register">
                        <form method="POST" class="formulito" action="<?php echo e(route('registerUsuario')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="form-group row">
                                <label for="nombreusu "
                                       class="col-md-4 col-form-label text-md-right label-register"><?php echo e(__('Name')); ?></label>

                                <div class="col-md-6">
                                    <input id="nombreusu" type="text"
                                           class="form-control <?php $__errorArgs = ['nombreusu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           name="nombreusu" value="<?php echo e(old('nombreusu')); ?>" required
                                           autocomplete="nombreusu" autofocus>

                                    <?php $__errorArgs = ['nombreusu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right label-register"><?php echo e(__('E-Mail')); ?></label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">

                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right label-register"><?php echo e(__('Password')); ?></label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"
                                           required autocomplete="new-password">

                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label label-register text-md-right"><?php echo e(__('Confirm Password')); ?></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tipo" class="col-md-4 col-form-label text-md-right label-register">Tipo</label>

                                <div class="col-md-6">
                                    <select name="tipo" class="form-control" id="tipo">
                                        <option value="0">-</option>
                                    <?php
                                        $usuario=App\Users::find(Auth::id());
                                        if($usuario->tipo==1){
                                            echo '<option value="1">Gerente</option>';
                                        }
                                        ?>
                                        <option value="2">Coordinador</option>
                                        <option value="3">Operador</option>
                                        <option value="4">Técnico</option>
                                    </select>

                                    <?php $__errorArgs = ['tipo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div id="camposTecnico">
                            <div class="form-group row">
                                    <label for="nombretecnico" class="col-md-4 col-form-label text-md-right label-register">Nombre </label>
                                 <div class="col-md-6">
                                     <input id="nombretecnico" type="text" name="nombretecnico" class="form-control">
                                 </div>
                            </div>
                            <div  class="form-group row">
                                <label for="apellidotecnico" class="col-md-4 col-form-label text-md-right label-register">Apellido </label>
                                <div class="col-md-6">
                                    <input id="apellidotecnico" type="text" name="apellidotecnico" class="form-control">
                                </div>
                            </div>
                            <div  class="form-group row">
                                <label for="localizaciontecnico" class="col-md-4 col-form-label text-md-right label-register">Localizacion </label>
                                <div class="col-md-6">
                                    <input id="pac-input" type="text" name="localizacion" class="form-control" placeholder=" ">
                                    <input type="hidden" name="localizaciontecnico" id="localizaciontecnico">
                                    <div id="map"></div>
                                </div>
                            </div>
                            <div  class="form-group row">
                                <label for="telefonotecnico" class="col-md-4 col-form-label text-md-right label-register">Telefono </label>
                                <div class="col-md-6">
                                    <input id="telefonotecnico" type="text" name="telefonotecnico" class="form-control">
                                </div>
                            </div>
                            </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary especialito">
                                            <?php echo e(__('Register')); ?>

                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


    </div>
    <script>

        $("#tipo").on('change', function () {
            var option = this.value;

            // alert(option);

            var campostecnico = $("#camposTecnico");

            switch(option) {
                case "0":
                    $("#card-header-register").css("background-color","rgba(0,0,0,.03)");
                    $("#card-body-register").css("background-color","white");
                    $("#card-body-register").css("border","1px solid rgba(0,0,0,.125)");

                    campostecnico.css("display", "none");

                    break;
                case "1":
                    $("#card-header-register").css("background-color","rgba(249, 44, 44, 0.22)");
                    $("#card-body-register").css("background-color","rgba(249, 44, 44, 0.02)");
                    $("#card-body-register").css("border","1px solid rgba(249, 44, 44, 0.22)");

                    campostecnico.css("display", "none");
                    break;
                case "2":
                    $("#card-header-register").css("background-color"," rgba(61, 164, 250, 0.22)");
                    $("#card-body-register").css("background-color"," rgba(61, 164, 250, 0.02)");
                    $("#card-body-register").css("border","1px solid rgba(61, 164, 250, 0.22)");

                    campostecnico.css("display", "none");
                    break;
                case "3":
                    $("#card-header-register").css("background-color","rgba(216, 156, 250, 0.22)");
                    $("#card-body-register").css("background-color","rgba(216, 156, 250, 0.02)");
                    $("#card-body-register").css("border","1px solid rgba(216, 156, 250, 0.22)");

                    campostecnico.css("display", "none");
                    break;
                case "4":
                    campostecnico.css("display", "flex");
                    $("#card-header-register").css("background-color","rgba(135, 220, 44, 0.22)");
                    $("#card-body-register").css("background-color","rgba(135, 220, 44, 0.02)");
                    $("#card-body-register").css("border","1px solid  rgba(135, 220, 44, 0.22)");
                    break;

            }
        });
        let campoemail = document.getElementById("email");
            campoemail.addEventListener("focusout",function () {
                let email = document.getElementById("email").value;
                $.ajax({
                    data: email,
                    url: "/users/buscaremails",
                    type: "GET",
                    async: false,
                    success: function (result) {
                         console.log(result)
                        for(let x=0;x<result.length;x++){
                            if(result[x]['email'] == email){
                                alert("El correo introducido ya esta en uso");
                            }
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log(thrownError);
                    }
                });
        });
    </script>
    <script>


        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -33.8688, lng: 151.2195},
                zoom: 13,
                mapTypeId: 'roadmap'
            });

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
                    var marca;
                    // Create a marker for each place.
                    marca = markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));



                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                    document.getElementById("localizaciontecnico").value = place.geometry.location;
                });
                map.fitBounds(bounds);
            });
        }

    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQ1IlkRnZIO-tM5Z-OcVz2r6Pk7egLuTA&libraries=places"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQ1IlkRnZIO-tM5Z-OcVz2r6Pk7egLuTA&libraries=places&callback=initAutocomplete"
            async defer></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/auth/register.blade.php ENDPATH**/ ?>