

<?php $__env->startSection('content'); ?>

    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title"><?php echo e($config['title']); ?></h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="<?php echo e(route('portal.home.index')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('portal.manage.index')); ?>">Administração</a></li>
                <li><a href="<?php echo e(route('portal.manage.reserve-areas.index')); ?>">Recurso Comum</a></li>
                <li class="active">Cadastrar</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">
                    <?php
                    $urlBack = route('portal.manage.reserve-areas.index');
                    ?>
                    <?php echo $__env->make('portal.layouts.btn_black', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('success._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('errors._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php echo Form::open(['route'=>'portal.manage.reserve-areas.store']); ?>


                    <?php echo $__env->make('portal.manage.reserve-areas._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <div class="form-group text-right">
                        <button type="submit" data-toggle="tooltip" data-original-title="Cadastrar Recurso" class="btn btn-success waves-effect waves-light">
                            <i class="icon md-check" aria-hidden="true"></i>
                            Cadastrar Recurso
                        </button>
                    </div>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>