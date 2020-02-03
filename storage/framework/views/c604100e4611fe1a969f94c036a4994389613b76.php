<html>
<head>

    <title>Asistencia en Carretera - CZone</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link  rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
    <link  rel="stylesheet" href="<?php echo e(secure_asset('css/login.css')); ?>">

    <script src="<?php echo e(asset('js/app.js')); ?>" type="text/js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>



</head>
<body>
    <div class="img">
        <div class="color-cortina">
        </div>
        <img class="imagen" src="<?php echo e(asset('img/fondo.png')); ?>">
    </div>
    <div class="container">
        <div class="izquierda">
            <div class="row justify-content-center form-box">
                <div class="col-md-12 login-col">
                    <div class="card">
                        <div class="card-header"><?php echo e(__('Login')); ?></div>

                        <div class="card-body">
                            <form method="POST" action="<?php echo e(route('login')); ?>">
                                <?php echo csrf_field(); ?>

                                <div class="form-group row contenedor-input">
                                    <label for="nombreusu" class="col-md-4 col-form-label text-md-right label-register">Nombre</label>

                                    <div class="col-md-6 contenedor-input-label">
                                        <input id="nombreusu" type="text" class="form-control input-login" style="margin: 0 !important;" <?php $__errorArgs = ['nombreusu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nombreusu" value="<?php echo e(old('nombreusu')); ?>" required autocomplete="nombreusu" autofocus>

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

                                <div class="form-group row contenedor-input">
                                    <label for="password" class="col-md-4 col-form-label text-md-right label-login"><?php echo e(__('Password')); ?></label>

                                    <div class="col-md-6 contenedor-input-label">
                                        <input id="password" type="password" class="form-control input-login <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

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

                                <div class="form-group row remember">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                            <label class="form-check-label label-login" for="remember">
                                                <?php echo e(__('Remember Me')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4 contenedor-logineo">
                                        <button type="submit" class="btn btn-primary btn-logineo">
                                            <?php echo e(__('Login')); ?>

                                        </button>

                                        <?php if(Route::has('password.request')): ?>
                                            <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">

                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="derecha">
            <div class="contenedor-titulo">
                <h1 class="empresa"> CZONE </h1>
                <h2 class="eslogan">RoadTech</h2>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH /home/vagrant/code/resources/views/auth/login.blade.php ENDPATH**/ ?>