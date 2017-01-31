
<?php $__env->startSection('content'); ?>

    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title"><?php echo e($config['title']); ?></h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="<?php echo e(route('portal.home.index')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('portal.manage.index')); ?>">Administração</a></li>
                <li><a href="<?php echo e(route('portal.manage.contract.index')); ?>">Contratos</a></li>
                <li class="active">Alterar</li>
            </ol>
            <div class="page-header-actions">
                <a href="<?php echo e(route('portal.manage.contract.index')); ?>"
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
                    <?php echo $__env->make('success._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('errors._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('portal.modals.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('portal.modals.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php echo Form::model($dados, ['route'=>['portal.manage.contract.update', $dados->id], 'files' => true]); ?>


                    <?php echo $__env->make('portal.manage.contract._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <div class="form-group text-right">
                        <div class="form-group text-right">
                            <button type="submit"
                                    data-toggle="tooltip"
                                    data-original-title="Salvar Alteração"
                                    class="btn btn-raised btn-primary waves-effect waves-light">
                                <i class="icon wb-plus" aria-hidden="true"></i>
                                Salvar Alteração
                            </button>
                        </div>
                    </div>

                    <?php echo Form::close(); ?>


                    <?php if(!$files->isEmpty()): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="tablesaw table-striped table-bordered table-hover"
                                       data-tablesaw-mode="swipe"
                                       data-tablesaw-sortable data-tablesaw-minimap>
                                    <thead>
                                    <tr>
                                        <th data-tablesaw-sortable-col data-tablesaw-sortable-default-col
                                            data-tablesaw-priority="persist">Nome
                                        </th>
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="2">Data Cadastro</th>
                                        <th class="text-center col-md-2">
                                            Ação
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr>
                                            <td><?php echo e($row->name); ?></td>
                                            <td><?php echo e(date('d/m/Y h:i', strtotime($row->created_at))); ?></td>
                                            <td class="text-center">
                                                <a href="<?php echo e(route('portal.manage.contract.file.show',['id' => $row->id])); ?>"
                                                   title="Visualizar"
                                                   data-toggle="tooltip"
                                                   data-original-title="Visualizar"
                                                   target="_blank"
                                                   class="btn btn-icon bg-success waves-effect waves-light waves-effect waves-light">
                                                    <i class="icon wb-zoom-in" aria-hidden="true"></i>
                                                </a>
                                                <button title="Excluir"
                                                        class="btn btn-icon bg-danger waves-effect waves-light btnDelete"
                                                        data-target="#modalDelete" data-toggle="modal"
                                                        data-route="<?php echo e(route('portal.manage.contract.file.destroy', ['id' => $row->id])); ?>">
                                                    <i class="icon wb-trash" aria-hidden="true"></i>
                                                </button>
                                            </td>
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