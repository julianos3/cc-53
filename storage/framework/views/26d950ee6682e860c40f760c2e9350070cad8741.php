
<?php $__env->startSection('content'); ?>
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title"><?php echo e($config['title']); ?></h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="<?php echo e(route('portal.home.index')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('portal.communication.index')); ?>">Comunicação</a></li>
                <li><a href="<?php echo e(route('portal.communication.called.index')); ?>">Chamados</a></li>
                <li class="active">Visualizar</li>
            </ol>
            <div class="page-header-actions">
                <a href="<?php echo e(route('portal.communication.called.index')); ?>"
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
                    <div class="row">
                        <div class="col-md-12">
                            <label for="assunto"><strong>Assunto</strong></label>
                            <p class="form-control-static"><?php echo e($dados['subject']); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="codigo"><strong>Código</strong></label>
                            <p class="form-control-static">Nº: <?php echo e($dados['id']); ?></p>
                        </div>
                        <div class="col-md-4">
                            <label for="codigo"><strong>Tipo</strong></label>
                            <p class="form-control-static"><?php echo e($dados['calledCategory']['name']); ?></p>
                        </div>
                        <div class="col-md-4">
                            <label for="assunto"><strong>Criado Por</strong></label>
                            <p class="form-control-static"><?php echo e($dados['userCondominium']['user']['name']); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="assunto"><strong>Público?</strong></label>
                            <p class="form-control-static"><?php if($dados['visible'] == 'y'): ?> Sim <?php else: ?> Não <?php endif; ?></p>
                        </div>
                        <div class="col-md-4">
                            <label for="assunto"><strong>Data de Abertura</strong></label>
                            <p class="form-control-static"><?php echo e(date('d/m/Y h:i', strtotime($dados['created_at']))); ?></p>
                        </div>
                        <?php if($dados['called_status_id'] != 1): ?>
                            <?php
                            $dateEncerramento = end($dados['calledHistoric']);
                            $createdAt = '';
                            foreach($dateEncerramento  as $date){
                                $createdAt = $date->created_at;
                            }
                            ?>
                            <div class="col-md-4">
                                <label for="assunto"><strong>Data de Encerramento</strong></label>
                                <p class="form-control-static"><?php echo e(date('d/m/Y h:i', strtotime($createdAt))); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if(!$dados['calledHistoric']->isEmpty()): ?>
                        <hr>
                        <h4>Andamento</h4>
                        <?php
                        $total = $dados['calledHistoric']->count();
                        $cont = 0;
                        ?>
                        <?php $__currentLoopData = $dados['calledHistoric']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php $cont++; ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <strong>CRIADO EM</strong> <?php echo e(date('d/m/Y h:i', strtotime($row['created_at']))); ?>

                                    <strong>POR</strong> <?php echo e($row['userCondominium']['user']['name']); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo nl2br($row->description); ?><br />
                                    <?php if($total > $cont): ?>
                                        ----------------------------------------------------------------------------------------------------
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <hr>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>