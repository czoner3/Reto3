<?php $__env->startSection('content'); ?>
<div class="row col-11"><h1>Gestion de bodegas</h1></div>
<div class="row col-11">
    <form action="/incidencia" method="get">
    <div class="incidencia" class="form-group" style="width: 50%;float: left;">
        <div>
            <label for="tipoincidencia">Tipo de incidencia:</label>
            <input class="form-control" type="text" id="tipoincidencia" name="tipoincidencia">
        </div>
        <div>
            <label for="estado">Estado:</label>
            <input class="form-control" type="text" id="estado" name="estado">
        </div>
        <div>
            <label for="cliente">Cliente:</label>
            <input class="form-control" type="text" id="cliente" name="cliente">
        </div>
        <div>
            <label for="operador">Operador:</label>
            <input class="form-control" type="text" id="operador" name="operador">
        </div>
        <div>
            <label for="tecnico">Tecnico:</label>
            <input class="form-control" type="text" id="tecnico" name="tecnico">
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
            <th>Observaciones</th>
            <th>Estado</th>
            <th>Cliente</th>
            <th>Operador</th>
            <th>Tecnico</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $incidencia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inci): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php switch($inci->tipoincidencia):
                        case (0): ?>
                        Pinchazo
                        <?php break; ?>
                        <?php case (1): ?>
                        Golpe
                        <?php break; ?>
                        <?php case (2): ?>
                        Averia
                        <?php break; ?>
                        <?php case (3): ?>
                        Otro
                        <?php break; ?>
                    <?php endswitch; ?>

                </td>
                <td><?php echo e($inci->lugar); ?></td>
                <td><?php echo e($inci->observaciones); ?></td>
                <td><?php echo e(($inci->estado)?'Yes':'No'); ?></td>
                <td>
                    <?php echo e($inci->Cliente_id); ?>

                </td>
                <td>
                    <?php echo e($inci->Usuario_id); ?>

                </td>
                <td><?php echo e($inci->Tecnico_id); ?>

                </td>
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