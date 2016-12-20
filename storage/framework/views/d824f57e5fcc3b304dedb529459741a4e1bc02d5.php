<?php $__env->startSection('content'); ?>
    <div class="page animsition">
    ID Condominium: <?php echo e($condominium->id); ?><br />
    Condominium Name: <?php echo e($condominium->name); ?><br />
    User Condominium ID: <?php echo e($userCondominiumId); ?>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>