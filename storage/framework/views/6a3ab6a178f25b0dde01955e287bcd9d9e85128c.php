
<?php $__env->startSection('content'); ?>
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title"><?php echo e($config['title']); ?></h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="<?php echo e(route('portal.home.index')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('portal.condominium.index')); ?>">Condomínio</a></li>
                <li class="active">Câmeras de Segurança</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">
                    <?php echo $__env->make('success._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('errors._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('portal.modals.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('portal.condominium.security-cam.modal_show', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php if(session()->get('admin') == 'y'): ?>
                    <a href="<?php echo e(route('portal.condominium.security-cam.create')); ?>"
                       data-toggle="tooltip"
                       data-original-title="Cadastrar"
                       class="btn btn-primary waves-effect waves-light margin-right-15">
                        <i class="icon wb-plus" aria-hidden="true"></i>
                        Cadastrar
                    </a>
                    <?php endif; ?>

                    <?php if(!$dados->isEmpty()): ?>
                        <a href="<?php echo e(route('portal.condominium.security-cam.list')); ?>"
                           data-toggle="tooltip"
                           data-original-title="Visualizar Todas as camêras"
                           class="btn btn-warning waves-effect waves-light m-top-w-450-10">
                            <i class="icon wb-camera col-lg-12 offset" aria-hidden="true"></i>
                            Visualizar Todas as camêras
                        </a>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="tablesaw table-striped table-bordered table-hover"
                                       data-tablesaw-mode="swipe"
                                       data-tablesaw-sortable data-tablesaw-minimap>
                                    <thead>
                                    <tr>
                                        <th data-tablesaw-sortable-col data-tablesaw-sortable-default-col
                                            data-tablesaw-priority="persist">Descrição
                                        </th>
                                        <th class="text-center col-md-2">
                                            Ação
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr>
                                            <td><?php echo e($row->name); ?></td>
                                            <td class="text-center">
                                                <button title="Visualizar"
                                                        class="btn btn-icon bg-success waves-effect waves-light btnShowCam"
                                                        data-target="#modalCam" data-toggle="modal"
                                                        data-id="<?php echo e($row->id); ?>">
                                                    <i class="icon wb-zoom-in" aria-hidden="true"></i>
                                                </button>

                                                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('admin', $row)): ?>
                                                <a href="<?php echo e(route('portal.condominium.security-cam.edit', ['id' => $row->id])); ?>"
                                                   title="Editar"
                                                   class="btn btn-icon bg-warning waves-effect waves-light">
                                                    <i class="icon wb-edit" aria-hidden="true"></i>
                                                </a>
                                                <button title="Excluir"
                                                        class="btn btn-icon bg-danger waves-effect waves-light btnDelete"
                                                        data-target="#modalDelete" data-toggle="modal"
                                                        data-route="<?php echo e(route('portal.condominium.security-cam.destroy', ['id' => $row->id])); ?>">
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
                                    Nenhum câmera de segurança cadastrada.
                                </h4>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php if(session()->get('admin') == 'y'): ?>
    <a href="<?php echo e(route('portal.condominium.security-cam.create')); ?>" title="Cadastrar"
       data-toggle="tooltip"
       data-original-title="Cadastrar"
       class="site-action site-floataction btn-raised btn btn-success btn-floating">
        <i class="icon md-plus" aria-hidden="true"></i>
    </a>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>