<?php $__env->startSection('content'); ?>
<div class="contenedor">

<div class="row col-11 filtros">
    <form action="/incidencia" method="get">
    <div class="incidencia" class="form-group" style="">
        <div class="selection-div">
        <div class="selection">
            <label for="tipoincidencia">Tipo:</label>
            <select class="custom-select" name="tipoincidencia">
                <option value="">--</option>
                <option value="1">Pinchazo</option>
                <option value="2">Golpe</option>
                <option value="3">Avería</option>
                <option value="4">Otro</option>
            </select>
            
        </div>
        <div class="selection">
            <label for="estado">Estado:</label>
            <select class="custom-select" name="estado">
                <option value="">--</option>
                <option class="normal" value="1">Abierta</option>
                <option class="resuelta" value="2">Cerrada garaje</option>
                <option class="resuelta" value="3">Cerrada insitu</option>

            </select>
            
        </div>
        <div class="selection">
            <label for="cliente_id">Cliente:</label>
            <select class="custom-select" name="cliente_id">
                <option value="">--</option>
                <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cliente->id); ?>"><?php echo e($cliente->nombrecli); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            
        </div>
        <div class="selection">
            <label for="usuario_id">Operador:</label>
            <select class="custom-select" name="usuario_id">
                <option value="">--</option>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->nombreusu); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            
        </div>
        <div class="selection">
            <label for="tecnico_id">Tecnico:</label>
            <select class="custom-select" name="tecnico_id">
                <option value="">--</option>
                <?php $__currentLoopData = $tecnicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tecnico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($tecnico->id); ?>"><?php echo e($tecnico->nombre . ' ' . $tecnico->apellido); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            
        </div>
        </div>
            <div class="button-div">
                    <div class="row mb-3">
                   <button type="submit" class="btn btn-1-alpha btn-sep icon-send">  <img src="https://icomoon.io/icons5d33221/6/218.svg">Filtrar</button>
                    </div>
            </div>
                </div>
    </form>
</div>

<div class="row col-11 tabla">
    <table class="table table-inci" style="overflow-x: auto" border="1">
        <thead class="thead edited-header">
        <tr>
            <th>Tipo incidencia</th>
            <th>Estado</th>
            <th>Fecha incidencia</th>
            <th>ID Cliente</th>
            <th>Nombre cliente</th>
            <th>ID Usuario</th>
            <th>Nombre Operador</th>
            <th>ID Tecnico</th>
            <th>Nombre tecnico</th>
            <th>Observaciones</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $incidencia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inci): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="brillo">
                <td>
                    <?php switch($inci->tipoincidencia):
                        case (1): ?>
                        Pinchazo
                        <?php break; ?>
                        <?php case (2): ?>
                        Golpe
                        <?php break; ?>
                        <?php case (3): ?>
                        Avería
                        <?php break; ?>
                        <?php case (4): ?>
                        Otro
                        <?php break; ?>
                    <?php endswitch; ?>

                </td>

                <td>
                    <?php switch($inci->estado):
                        case (1): ?>
                        Abierta
                        <?php break; ?>
                        <?php case (2): ?>
                        Cerrada en garaje
                        <?php break; ?>
                        <?php case (3): ?>
                        Cerrada in situ
                        <?php break; ?>
                    <?php endswitch; ?>
                    </td>

                <td><?php echo e($inci->created_at); ?></td>

                <td>
                    <?php echo e($inci->cliente_id); ?>

                </td>
                <td>
                    <?php echo e(\App\Cliente::find($inci->cliente_id)->nombrecli); ?>

                </td>
                <td>
                    <?php echo e($inci->usuario_id); ?>

                </td>
                <td>
                    <?php echo e(\App\Users::find($inci->usuario_id)->nombreusu); ?>

                </td>
                <td>
                    <?php echo e($inci->tecnico_id); ?>

                </td>
                <td>
                    <?php echo e(\App\Tecnico::find($inci->tecnico_id)->nombre); ?>

                </td>
                <td style="overflow: auto"><?php echo e($inci->observaciones); ?></td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
</div>
<div class="paginacion">
<?php echo e($incidencia->links()); ?>

</div>

        <?php $__currentLoopData = $incidencia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inci): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php if($inci->estado==1): ?>
        <script>
            $(".brillo").css("animation-name", "parpadeo-last-child");

        </script>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/incidencia.blade.php ENDPATH**/ ?>