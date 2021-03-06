

<?php $__env->startSection('content'); ?>

    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title"><?php echo e($config['title']); ?></h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="<?php echo e(route('portal.home.index')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('portal.condominium.index')); ?>">Condomínio</a></li>
                <li class="active">Grupos</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">
                    <?php echo $__env->make('success._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('errors._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('portal.modals.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('portal.condominium.group.modals.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('portal.condominium.group.modals.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php if(session()->get('admin') == 'y'): ?>
                    <a href="javascript:void(0);"
                       data-target="#modalGroupCreate" data-toggle="modal"
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
                                            data-tablesaw-priority="persist">Nome
                                        </th>
                                        <?php if(session()->get('admin') == 'y'): ?>
                                        <th class="text-center col-md-1">
                                            Ativo
                                        </th>
                                        <?php endif; ?>
                                        <th class="text-center col-md-2">
                                            Ação
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr>
                                            <td><?php echo e($row->name); ?></td>
                                            <?php if(session()->get('admin') == 'y'): ?>
                                            <td class="text-center"><?php if($row->active == 'y'): ?> Sim <?php else: ?> Não <?php endif; ?></td>
                                            <?php endif; ?>
                                            <td class="text-center">
                                                <a href="<?php echo e(route('portal.condominium.group.user.index', ['id' => $row->id])); ?>"
                                                   title="Integrantes"
                                                   class="btn btn-icon bg-success waves-effect waves-light">
                                                    <i class="icon wb-users" aria-hidden="true"></i>
                                                </a>
                                                <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('admin', $row)): ?>
                                                <a href="javascript:void(0);"
                                                   title="Editar"
                                                   data-target="#modalGroupEdit" data-toggle="modal"
                                                   data-id="<?php echo e($row->id); ?>"
                                                   class="btn btn-icon bg-warning waves-effect waves-light btnEditGroup">
                                                    <i class="icon wb-edit" aria-hidden="true"></i>
                                                </a>
                                                <button title="Excluir"
                                                        class="btn btn-icon bg-danger waves-effect waves-light btnDelete"
                                                        data-target="#modalDelete" data-toggle="modal"
                                                        data-route="<?php echo e(route('portal.condominium.group.destroy', ['id' => $row->id])); ?>">
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
                                    <br />
                                    Nenhum grupo cadastrado.
                                </h4>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php if(session()->get('admin') == 'y'): ?>
    <a href="javascript:void(0);" title="Cadastrar"
        data-target="#modalGroupCreate" data-toggle="modal"
        data-original-title="Cadastrar"
        class="site-action site-floataction btn-raised btn btn-success btn-floating">
        <i class="icon md-plus" aria-hidden="true"></i>
    </a>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>