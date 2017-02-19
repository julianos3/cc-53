<?php $__env->startSection('content'); ?>
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title"><?php echo e($condominium->name); ?></h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="<?php echo e(route('portal.home.index')); ?>">Home</a></li>
                <li class="active"><?php echo e($condominium->name); ?></li>
            </ol>
        </div>

        <div class="page-content container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">
                <?php echo $__env->make('portal.home.inc.alert_condominium', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('portal.home.inc.subscriptions', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('portal.home.inc.statistics', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('portal.home.inc.called', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('portal.home.inc.communication', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>