

<?php $__env->startSection('content'); ?>

    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title"><?php echo e($config['title']); ?></h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="<?php echo e(route('portal.home.index')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('portal.condominium.index')); ?>">Condomínio</a></li>
                <li><a href="<?php echo e(route('portal.condominium.group.index')); ?>">Grupos</a></li>
                <li class="active">Integrantes</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">

                    <div class="row">
                        <?php if(session()->get('admin') == 'y'): ?>
                        <div class="col-md-6 padding-bottom-10">
                            <a href="javascript:void(0);"
                               data-original-title="Cadastrar"
                               data-target="#modalGroupUser" data-toggle="modal"
                               class="btn btn-primary waves-effect waves-light">
                                <i class="icon wb-plus" aria-hidden="true"></i>
                                Cadastrar
                            </a>
                        </div>
                        <?php endif; ?>
                        <div class="<?php if(session()->get('admin') == 'y'): ?> col-md-6 <?php else: ?> col-md-12 <?php endif; ?> padding-bottom-10 text-right">
                            <a href="<?php echo e(route('portal.condominium.group.index')); ?>"
                               data-toggle="tooltip"
                               data-original-title="Voltar" title="Voltar"
                               class="btn btn-dark waves-effect waves-light">
                                <i class="icon md-arrow-left" aria-hidden="true"></i>
                                Voltar
                            </a>
                        </div>
                    </div>

                    <?php echo $__env->make('success._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('errors._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('portal.modals.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('portal.condominium.group.user.modals.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php if(!$dados->isEmpty()): ?>
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
                                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('admin', $dados[0])): ?>
                                        <th class="text-center col-md-2">
                                            Ação
                                        </th>
                                        <?php endif; ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr>
                                            <td><?php echo e($row->userCondominium->user->name); ?></td>
                                            <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('admin', $dados[0])): ?>
                                            <td class="text-center">
                                                <button title="Excluir"
                                                        class="btn btn-icon bg-danger waves-effect waves-light btnDelete"
                                                        data-target="#modalDelete" data-toggle="modal"
                                                        data-route="<?php echo e(route('portal.condominium.group.user.destroy', ['groupId' => $groupId, 'id' => $row->id])); ?>">
                                                    <i class="icon wb-trash" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <?php endif; ?>
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
                                    <br />
                                    Nenhum integrante adicionado a este grupo.
                                </h4>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php if(session()->get('admin') == 'y'): ?>
    <a href="javascript:void(0);"
       data-target="#modalGroupUser" data-toggle="modal" title="Cadastrar" class="site-action site-floataction btn-raised btn btn-success btn-floating">
        <i class="icon md-plus" aria-hidden="true"></i>
    </a>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>