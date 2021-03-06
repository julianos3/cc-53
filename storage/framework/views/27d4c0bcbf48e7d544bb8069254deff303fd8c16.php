

<?php $__env->startSection('content'); ?>
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title"><?php echo e($config['title']); ?></h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="<?php echo e(route('portal.home.index')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('portal.communication.index')); ?>">Comunicação</a></li>
                <li><a href="<?php echo e(route('portal.communication.communication-condominium.index')); ?>">Comunicados</a></li>
                <li class="active">Visualizar</li>
            </ol>
        </div>
        <div class="page-content container-fluid">
            <div class="panel">
                <div class="panel-body">
                    <?php
                    $urlBack = route('portal.communication.communication-condominium.index');
                    ?>
                    <?php echo $__env->make('portal.layouts.btn_black', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                    <div class="row">
                        <div class="col-md-4">
                            <label for="codigo"><strong>Visivel até</strong></label>
                            <p class="form-control-static"><?php echo e(date('d/m/Y', strtotime($dados->date_display))); ?></p>
                        </div>
                        <div class="col-md-4">
                            <label for="codigo"><strong>Enviado por e-mail?</strong></label>
                            <p class="form-control-static"><?php if($dados->send_mail == 'y'): ?> Sim <?php else: ?> Não <?php endif; ?></p>
                        </div>
                        <div class="col-md-4">
                            <label for="codigo"><strong>Todos os usuários?</strong></label>
                            <p class="form-control-static"><?php if($dados->all_user == 'y'): ?> Sim <?php else: ?> Somente Grupos <?php endif; ?></p>
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
                            <p class="form-control-static"><?php echo nl2br($dados->description); ?></p>
                        </div>
                    </div>
                    <?php if($dados->all_user == 'n'): ?>
                    <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="tablesaw table-striped table-bordered table-hover"
                                       data-tablesaw-mode="swipe"
                                       data-tablesaw-sortable data-tablesaw-minimap>
                                    <thead>
                                        <tr>
                                            <th data-tablesaw-sortable-col data-tablesaw-sortable-default-col
                                                data-tablesaw-priority="persist">Grupos
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $dados->communicationGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr>
                                            <td><?php echo e($row->groupCondominium->name); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(!$dados->userCommunication->isEmpty()): ?>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="tablesaw table-striped table-bordered table-hover"
                                   data-tablesaw-mode="swipe"
                                   data-tablesaw-sortable data-tablesaw-minimap>
                                <thead>
                                <tr>
                                    <th data-tablesaw-sortable-col data-tablesaw-sortable-default-col
                                        data-tablesaw-priority="persist">Integrantes
                                    </th>
                                    <th data-tablesaw-sortable-col data-tablesaw-priority="1">E-mail</th>
                                    <th class="text-center" data-tablesaw-priority="2">Visualizado</th>
                                    <th class="text-center" data-tablesaw-priority="3">Data Visualizado</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $dados->userCommunication; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <tr>
                                        <td><?php echo e($row->userCondominium->user->name); ?></td>
                                        <td><?php echo e($row->userCondominium->user->email); ?></td>
                                        <td class="text-center">
                                            <?php if($row->view == 'y'): ?>
                                                <i class="icon wb-check text-success" aria-hidden="true"></i>
                                            <?php else: ?>
                                                <i class="icon wb-close text-danger" aria-hidden="true"></i>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center"><?php echo e(date('d/m/Y H:i', strtotime($row->created_at))); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>