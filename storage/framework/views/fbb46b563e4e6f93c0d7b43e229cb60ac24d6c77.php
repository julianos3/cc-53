

<?php $__env->startSection('content'); ?>
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title"><?php echo e($config['title']); ?></h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="<?php echo e(route('portal.home.index')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('portal.manage.index')); ?>">Administração</a></li>
                <li class="active"><?php echo e($config['title']); ?></li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-12 margin-top-15">

                            <?php echo $__env->make('success._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php echo $__env->make('errors._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php echo $__env->make('portal.condominium.diary.modals.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php echo $__env->make('portal.modals.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            <div id="calendar"></div>
                        </div>
                    </div>

                    <div class="modal fade modal-success none" id="editNewEvent" aria-hidden="true" aria-labelledby="editNewEvent"
                         role="dialog" tabindex="-1" data-show="false">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title">Alterar Reserva</h4>
                                </div>
                                <div class="modal-body">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="javascript:void(0);" title="Cadastrar"
           data-target="#addNewEvent" data-toggle="modal"
           data-original-title="Cadastrar"
           id="addNewEvent"
           class="site-action site-floataction btn-raised btn btn-success btn-floating">
            <i class="icon md-plus" aria-hidden="true"></i>
        </a>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>