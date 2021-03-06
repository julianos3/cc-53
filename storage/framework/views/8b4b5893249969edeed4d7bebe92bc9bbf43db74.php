

<?php $__env->startSection('content'); ?>
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title"><?php echo e($config['title']); ?></h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="<?php echo e(route('portal.home.index')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('portal.condominium.index')); ?>">Condomínio</a></li>
                <li><a href="<?php echo e(route('portal.condominium.user.index')); ?>">Integrantes</a></li>
                <li class="active">Alterar</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">
                    <?php
                    $urlBack = route('portal.condominium.user.index');
                    ?>
                    <?php echo $__env->make('portal.layouts.btn_black', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('success._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('errors._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('portal.modals.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php echo Form::model($dados, ['route'=> ['portal.condominium.user.update', $userCondominium->id], 'files' => true]); ?>

                    <div class="example-wrap margin-lg-0">
                        <div class="nav-tabs-horizontal">

                            <?php echo $__env->make('portal.condominium.user._menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            <div class="tab-content padding-top-20">
                                <div class="tab-pane active" id="tabDadosPessoais" role="tabpanel">
                                    <?php echo $__env->make('portal.condominium.user.edit._form_dados_pessoais', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="submit" data-toggle="tooltip" data-original-title="Atualizar Dados" class="btn btn-success waves-effect waves-light">
                            <i class="icon md-check" aria-hidden="true"></i>
                            Atualizar Dados
                        </button>
                    </div>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>