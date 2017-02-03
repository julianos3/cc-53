

<?php $__env->startSection('content'); ?>
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title"><?php echo e($config['title']); ?></h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="<?php echo e(route('portal.home.index')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('portal.communication.index')); ?>">Comunicação</a></li>
                <li><a href="<?php echo e(route('portal.communication.communication.index')); ?>">Comunicados</a></li>
                <li class="active">Visualizar</li>
            </ol>
            <div class="page-header-actions">
                <a href="<?php echo e(route('portal.communication.communication.index')); ?>"
                   class="btn btn-sm btn-icon btn-dark waves-effect waves-light waves-round" data-toggle="tooltip"
                   data-original-title="Voltar">
                    <i class="icon wb-arrow-left" aria-hidden="true"></i>
                    Voltar
                </a>
            </div>
        </div>
        <div class="page-content container-fluid">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="codigo"><strong>Código</strong></label>
                            <p class="form-control-static">Nº: <?php echo e($dados->id); ?></p>
                        </div>
                        <div class="col-md-4">
                            <label for="codigo"><strong>Criado Por</strong></label>
                            <p class="form-control-static"><?php echo e($dados->userCondominium->user->name.' | '.$dados->userCondominium->userRoleCondominium->name); ?></p>
                        </div>
                        <div class="col-md-4">
                            <label for="codigo"><strong>Data Criado</strong></label>
                            <p class="form-control-static"><?php echo e(date('d/m/Y', strtotime($dados->created_at))); ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="codigo"><strong>Título</strong></label>
                            <p class="form-control-static"><?php echo e($dados->name); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="codigo"><strong>Descrição</strong></label>
                            <p class="form-control-static"><?php echo e($dados->description); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>