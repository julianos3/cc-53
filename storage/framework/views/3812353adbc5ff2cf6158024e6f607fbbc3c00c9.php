
<?php $__env->startSection('content'); ?>

    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title"><?php echo e($config['title']); ?></h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="<?php echo e(route('portal.home.index')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('portal.manage.index')); ?>">Administração</a></li>
                <li><a href="<?php echo e(route('portal.manage.contract.index')); ?>">Contratos</a></li>
                <li class="active">Cadastrar</li>
            </ol>
            <div class="page-header-actions">
                <a href="<?php echo e(route('portal.manage.contract.index')); ?>"
                   class="btn btn-sm btn-icon btn-dark waves-effect waves-light waves-round" data-toggle="tooltip"
                   data-original-title="Voltar">
                    <i class="icon wb-arrow-left" aria-hidden="true"></i>
                    Voltar
                </a>
            </div>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">
                    <?php echo $__env->make('success._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('errors._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('portal.modals.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php echo Form::open(['route'=>'portal.manage.contract.store', 'files' => true]); ?>


                    <?php echo $__env->make('portal.manage.contract._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <div class="form-group text-right">
                        <button type="submit"
                           data-toggle="tooltip"
                           data-original-title="Adicionar contrato"
                           class="btn btn-raised btn-primary waves-effect waves-light">
                            <i class="icon wb-plus" aria-hidden="true"></i>
                            Adicionar contrato
                        </button>
                    </div>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>