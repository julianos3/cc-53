
<?php $__env->startSection('content'); ?>
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title"><?php echo e($config['title']); ?></h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="<?php echo e(route('portal.home.index')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('portal.condominium.index')); ?>">Condomínio</a></li>
                <li class="active">Cadastrar</li>
            </ol>
        </div>
        <div class="page-content container-fluid">
            <div class="panel">
                <div class="panel-body">
                    <?php
                    $urlBack = route('portal.condominium.index');
                    ?>
                    <?php echo $__env->make('portal.layouts.btn_black', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::model($dados, ['route'=>['portal.condominium.update.info', $dados->id], 'files' => true]); ?>

                        <?php echo $__env->make('success._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('errors._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <?php echo $__env->make('portal.condominium.edit._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-success"
                                        data-toggle="tooltip"
                                        data-original-title="Avançar">
                                    <i class="icon wb-check" aria-hidden="true"></i>
                                    Salvar
                                </button>
                            </div>
                        </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>