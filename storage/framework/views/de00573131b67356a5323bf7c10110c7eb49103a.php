<?php $__env->startSection('content'); ?>

    <section role="main" class="content-body">
        <header class="page-header">
            <h2><?php echo e($config['title']); ?></h2>
            <div class="right-wrapper pull-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="<?php echo e(route('admin.home.index')); ?>">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li><span>Home</span></li>
                    <li><span><?php echo e($config['title']); ?></span></li>
                </ol>
                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
            </div>
        </header>
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title"><?php echo e($config['title']); ?></h2>
            </header>
            <div class="panel-body">

                <?php echo $__env->make('admin.layouts._msg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('admin.modals._delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="row">
                    <div class="col-sm-12 text-right">
                        <div class="mb-md">
                            <a href="<?php echo e(route('admin.tags.create')); ?>" title="Cadastrar" class="btn btn-success"><i class="fa fa-plus"></i> Cadastrar</a>
                        </div>
                    </div>
                </div>

                <?php if($dados->isEmpty()): ?>
                <div class="text-center">
                    <h4>Nenhum registro encontrado ou cadastrado.</h4>
                </div>
                <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-condensed mb-none">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th class="col-md-2 text-center">Ativo</th>
                                <th class="col-md-2 text-center">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($row->name); ?></td>
                                <td class="text-center">
                                    <div class="switch ativo switch-sm switch-success">
                                        <input type="checkbox" name="switch" data-route="<?php echo e(route('admin.tags.active', ['id' => $row->id])); ?>" data-plugin-ios-switch <?php if($row->active == 'y'): ?> checked="checked" <?php endif; ?> />
                                    </div>
                                </td>
                                <td class="actions text-center">
                                    <a href="<?php echo e(route('admin.tags.edit', ['id' => $row->id])); ?>" class="on-default edit-row" title="Editar">
                                        <i class="fa fa-pencil"></i>
                                        Editar
                                    </a>
                                    <a href="#modalAnim" data-route="<?php echo e(route('admin.tags.destroy', ['id' => $row->id])); ?>" class="on-default excluir remove-row" title="Excluir">
                                        <i class="fa fa-trash-o"></i>
                                        Excluir
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php echo e($dados->links()); ?>

                <?php endif; ?>
            </div>
        </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>