
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
                    <?php echo $__env->make('success._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('errors._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('portal.modals.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('portal.communication.called.modal.modal_show', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <a href="<?php echo e(route('portal.communication.called.create')); ?>"
                       data-toggle="tooltip"
                       data-original-title="Novo Chamado"
                       class="btn btn-primary waves-effect waves-light">
                        <i class="icon wb-plus" aria-hidden="true"></i>
                        Novo Chamado
                    </a>

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
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="1">Assunto</th>
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="2">Status</th>
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="3">Tipo</th>
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="3">Criado Por</th>
                                        <?php if(session()->get('admin') == 'y'): ?>
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="4">Visivel</th>
                                        <?php endif; ?>
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="5">Data de Abertura</th>
                                        <th class="text-center col-md-2">
                                            Detalhes
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr>
                                            <td><?php echo e($row->id); ?></td>
                                            <td><?php echo e($row->subject); ?></td>
                                            <td><?php echo e($row->calledStatus->name); ?></td>
                                            <td><?php echo e($row->calledCategory->name); ?></td>
                                            <td><?php echo e($row->userCondominium->user->name); ?></td>
                                            <?php if(session()->get('admin') == 'y'): ?>
                                            <td><?php if($row->visible == 'y'): ?> Sim <?php else: ?> Não <?php endif; ?></td>
                                            <?php endif; ?>
                                            <td><?php echo e(date('d/m/Y h:i', strtotime($row->created_at))); ?></td>
                                            <td class="text-center">
                                                <button title="Visualizar"
                                                        class="btn btn-icon bg-success waves-effect waves-light btnShowCalled"
                                                        data-target="#modalCalled" data-toggle="modal"
                                                        data-id="<?php echo e($row->id); ?>">
                                                    <i class="icon wb-zoom-in" aria-hidden="true"></i>
                                                </button>
                                                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('update', $row)): ?>
                                                <a href="<?php echo e(route('portal.communication.called.edit', ['id' => $row->id])); ?>"
                                                   title="Editar"
                                                   class="btn btn-icon bg-warning waves-effect waves-light">
                                                    <i class="icon wb-edit" aria-hidden="true"></i>
                                                </a>
                                                <?php endif; ?>
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
                                    Nenhum chamado realizado.
                                </h3>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <a href="<?php echo e(route('portal.communication.called.create')); ?>" title="Novo Chamado"
       data-toggle="tooltip"
       data-original-title="Novo Chamado"
       class="site-action site-floataction btn-raised btn btn-success btn-floating">
        <i class="icon md-plus" aria-hidden="true"></i>
    </a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>