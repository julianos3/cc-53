

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
        </div>
        <div class="page-content container-fluid">
            <div class="panel">
                <div class="panel-body">
                    <?php
                    $urlBack = route('portal.communication.communication.index');
                    ?>
                    <?php echo $__env->make('portal.layouts.btn_black', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="id"><strong>Código</strong></label>
                            <p class="form-control-static">Nº: <?php echo e($dados->id); ?></p>
                        </div>
                        <div class="col-md-4">
                            <label for="criado"><strong>Criado Por</strong></label>
                            <p class="form-control-static"><?php echo e($dados->userCondominium->user->name.' | '.$dados->userCondominium->userRoleCondominium->name); ?></p>
                        </div>
                        <div class="col-md-4">
                            <label for="created_at"><strong>Data Criado</strong></label>
                            <p class="form-control-static"><?php echo e(date('d/m/Y', strtotime($dados->created_at))); ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name"><strong>Título</strong></label>
                            <p class="form-control-static"><?php echo e($dados->name); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="description"><strong>Descrição</strong></label>
                            <p class="form-control-static"><?php echo nl2br($dados->description); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>