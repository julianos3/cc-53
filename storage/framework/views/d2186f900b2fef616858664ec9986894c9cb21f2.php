
<?php $__env->startSection('content'); ?>

    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title"><?php echo e($config['title']); ?></h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="<?php echo e(route('portal.home.index')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('portal.communication.index')); ?>">Comunicação</a></li>
                <li class="active"><?php echo e($config['title']); ?></li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">

                    <?php echo $__env->make('portal.communication.communication.modal.modal_show', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php if(!$dados->isEmpty()): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="tablesaw table-striped table-bordered table-hover"
                                       data-tablesaw-mode="swipe"
                                       data-tablesaw-sortable data-tablesaw-minimap>
                                    <thead>
                                    <tr>
                                        <th data-tablesaw-sortable-col data-tablesaw-sortable-default-col
                                            data-tablesaw-priority="persist">Código
                                        </th>
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="1">Título</th>
                                        <th class="text-center">Lido</th>
                                        <th class="text-center">Data Comunicado</th>
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="2">Criado Por</th>
                                        <th class="text-center">
                                            Detalhes
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr>
                                            <td><?php echo e($row->communication_id); ?></td>
                                            <td><?php echo e($row->communication->name); ?></td>
                                            <td class="text-center">
                                                <?php if($row->view == 'y'): ?>
                                                    <i class="icon wb-check text-success" aria-hidden="true"></i>
                                                <?php else: ?>
                                                    <i class="icon wb-close text-danger" aria-hidden="true"></i>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center"><?php echo e(date('d/m/Y', strtotime($row->created_at))); ?></td>
                                            <td><?php echo e($row->communication->userCondominium->user->name); ?></td>
                                            <td class="text-center">
                                                <button title="Visualizar"
                                                        class="btn btn-icon bg-success waves-effect waves-light btnShowModal"
                                                        data-target="#modalShowCommunication" data-toggle="modal"
                                                        data-route="<?php echo e(route('portal.communication.communication.show', ['id' => $row->communication_id])); ?>">
                                                    <i class="icon wb-zoom-in" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <?php echo $dados->setPath('')->appends(Request::except('page'))->render(); ?>

                            </div>
                        </div>
                    <?php else: ?>
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="page-title text-center padding-top-20">
                                    Nenhum comunicado recebido.
                                </h3>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>