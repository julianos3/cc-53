

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
                    <?php echo $__env->make('success._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('errors._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('portal.modals.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('portal.manage.maintenance.completed.modal_create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('portal.manage.maintenance.completed.modal_view', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php if(session()->get('admin') == 'y'): ?>
                    <a href="<?php echo e(route('portal.manage.maintenance.create')); ?>"
                       data-toggle="tooltip"
                       data-original-title="Cadastrar"
                       class="btn btn-primary waves-effect waves-light">
                        <i class="icon wb-plus" aria-hidden="true"></i>
                        Cadastrar
                    </a>
                    <?php endif; ?>

                    <?php if(!$dados->isEmpty()): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="tablesaw table-striped table-bordered table-hover"
                                       data-tablesaw-mode="swipe"
                                       data-tablesaw-sortable data-tablesaw-minimap>
                                    <thead>
                                    <tr>
                                        <th data-tablesaw-sortable-col data-tablesaw-sortable-default-col
                                            data-tablesaw-priority="persist">Manutenção
                                        </th>
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="1">Data de Início</th>
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="2">Período</th>
                                        <th class="text-center col-md-3">
                                            Ação
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr>
                                            <td><?php echo e($row->name); ?></td>
                                            <td><?php echo e(date('d/m/Y', strtotime($row->start_date))); ?></td>
                                            <td><?php echo e($row->periodicity->name); ?></td>
                                            <td class="text-center">
                                                <button title="Manutenções Realizadas"
                                                        class="btn btn-icon bg-success waves-effect waves-light btnMaintenanceViewCompleted"
                                                        data-target="#modalViewCompleted" data-toggle="modal"
                                                        data-id="<?php echo e($row->id); ?>">
                                                    <i class="icon wb-zoom-in" aria-hidden="true"></i>
                                                </button>
                                                <?php if(session()->get('admin') == 'y'): ?>
                                                <a href="<?php echo e(route('portal.manage.maintenance.completed.create', ['id' => $row->id])); ?>" title="Registar Manutenção"
                                                        class="btn btn-icon bg-dark waves-effect waves-light btnMaintenanceCompleted"
                                                        data-id="<?php echo e($row->id); ?>">
                                                    <i class="icon wb-wrench" aria-hidden="true"></i>
                                                </a>
                                                <a href="<?php echo e(route('portal.manage.maintenance.edit', ['id' => $row->id])); ?>"
                                                   title="Editar"
                                                   data-toggle="tooltip"
                                                   data-original-title="Editar"
                                                   class="btn btn-icon bg-warning waves-effect waves-light">
                                                    <i class="icon wb-edit" aria-hidden="true"></i>
                                                </a>
                                                <button title="Excluir"
                                                        class="btn btn-icon bg-danger waves-effect waves-light btnDelete"
                                                        data-target="#modalDelete" data-toggle="modal"
                                                        data-route="<?php echo e(route('portal.manage.maintenance.destroy', ['id' => $row->id])); ?>">
                                                    <i class="icon wb-trash" aria-hidden="true"></i>
                                                </button>
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
                            <div class="col-md-12 text-center">
                                <h4 class="page-title">
                                    Nenhuma manutenção cadastrada.
                                </h4>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php if(session()->get('admin') == 'y'): ?>
    <a href="<?php echo e(route('portal.manage.maintenance.create')); ?>" title="Cadastrar"
       data-toggle="tooltip"
       data-original-title="Cadastrar"
       class="site-action site-floataction btn-raised btn btn-success btn-floating">
        <i class="icon md-plus" aria-hidden="true"></i>
    </a>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>