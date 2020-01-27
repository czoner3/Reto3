<?php $__env->startSection('content'); ?>
<div class="row col-11"><h1>Incidencias</h1></div>
<div class="row col-11">
    <form action="/incidencia" method="get">
    <div class="incidencia" class="form-group" style="width: 50%;float: left;">
        <div>
            <label for="tipoincidencia">Tipo de incidencia:</label>
            <select class="custom-select" name="tipoincidencia">
                <option value="">--</option>
                <option value="1">Pinchazo</option>
                <option value="2">Golpe</option>
                <option value="3">Averia</option>
                <option value="4">Otro</option>
            </select>
            
        </div>
        <div>
            <label for="estado">Estado:</label>
            <select class="custom-select" name="estado">
                <option value="">--</option>
                <option value="1">Abierta</option>
                <option value="2">Cerrada garaje</option>
                <option value="3">Cerrada insitu</option>

            </select>
            
        </div>
        <div>
            <label for="cliente_id">Cliente:</label>
            <select class="custom-select" name="cliente_id">
                <option value="">--</option>
                <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cliente->id); ?>"><?php echo e($cliente->nombrecli); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            
        </div>
        <div>
            <label for="usuario_id">Operador:</label>
            <select class="custom-select" name="usuario_id">
                <option value="">--</option>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->nombreusu); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            
        </div>
        <div>
            <label for="tecnico_id">Tecnico:</label>
            <select class="custom-select" name="tecnico_id">
                <option value="">--</option>
                <?php $__currentLoopData = $tecnicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tecnico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($tecnico->id); ?>"><?php echo e($tecnico->nombre); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            
        </div>
        <div class="row mb-3">
            <input class=" btn btn-primary mr" type="submit" value="Filtrar">
        </div>
    </div>
    </form>
</div>

<div class="row col-11">
    <table class="table " border="1">
        <thead class="thead-dark ">
        <tr>
            <th>Tipo de incidencia</th>
            <th>Localizacion</th>
            <th>Estado</th>
            <th>Cliente</th>
            <th>Cliente nombre</th>
            <th>Usuario</th>
            <th>Usuario nombre</th>
            <th>Tecnico</th>
            <th>Tecnico nombre</th>
            <th>Observaciones</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $incidencia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inci): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php switch($inci->tipoincidencia):
                        case (1): ?>
                        Pinchazo
                        <?php break; ?>
                        <?php case (2): ?>
                        Golpe
                        <?php break; ?>
                        <?php case (3): ?>
                        Averia
                        <?php break; ?>
                        <?php case (4): ?>
                        Otro
                        <?php break; ?>
                    <?php endswitch; ?>

                </td>
                <td><?php echo e($inci->lugar); ?></td>
                <td><?php echo e(($inci->estado)?'Abierta':'Cerrada'); ?></td>
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
                <td><?php echo e($inci->observaciones); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>




<?php
/**
 * Created by PhpStorm.
 * User: msimm
 * Date: 17/01/2020
 * Time: 11:52
 */
?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/resources/views/incidencia.blade.php ENDPATH**/ ?>