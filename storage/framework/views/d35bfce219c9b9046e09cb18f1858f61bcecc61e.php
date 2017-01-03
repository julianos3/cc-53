

<?php $__env->startSection('content'); ?>

    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title"><?php echo e($config['title']); ?></h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="<?php echo e(route('portal.home.index')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('portal.condominium.index')); ?>">Condomínio</a></li>
                <li class="active">Integrantes</li>
            </ol>
        </div>
        <div class="page-content">

            <?php echo $__env->make('success._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('errors._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('portal.modals.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php if(session()->get('admin') == 'y'): ?>
            <div class="row">
                <div class="col-md-12 margin-bottom-20">
                    <a href="<?php echo e(route('portal.condominium.user.create')); ?>"
                       data-toggle="tooltip"
                       data-original-title="Cadastrar"
                       class="btn btn-primary waves-effect waves-light">
                        <i class="icon wb-plus" aria-hidden="true"></i>
                        Cadastrar
                    </a>
                </div>
            </div>
            <?php endif; ?>

            <?php if($dados->toArray()): ?>
                <div class="row">
                    <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <div class="col-md-3">
                            <div class="widget widget-shadow text-center">
                                <div class="widget-header">
                                    <div class="widget-header-content">
                                        <?php
                                        if($row->user->imagem){
                                            $imgAvatar = route('portal.condominium.user.image', ['id' => $row->user->id, 'image' => $row->user->imagem]);
                                        }else{
                                            $imgAvatar = asset('portal/assets/images/user-not-image.jpg');
                                        }
                                        ?>
                                        <?php if($imgAvatar): ?>
                                        <a class="avatar avatar-lg" href="<?php echo e(route('portal.condominium.user.show',['id' => $row->id])); ?>">
                                            <img src="<?php echo e($imgAvatar); ?>" alt="<?php echo e($row->user->name); ?>">
                                        </a>
                                        <?php endif; ?>
                                        <h5 class="profile-user"><?php echo e($row->user->name); ?></h5>
                                        <p class="profile-job"><?php echo e($row->userRoleCondominium->name); ?></p>
                                            <?php if($row->userUnit->toArray()): ?>
                                                <p>
                                                    <i class="icon icon-color md-pin" aria-hidden="true"></i>
                                                    <?php
                                                    $cont = 0;
                                                    foreach ($row->userUnit as $unit) {
                                                        $cont++;
                                                        if ($cont > 1) {
                                                            echo ', ';
                                                        }
                                                        echo $unit->unit->name . ' - ' . $unit->unit->block->name;
                                                    }
                                                    ?>
                                                </p>
                                            <?php endif; ?>
                                            <p>
                                        </p>
                                        <a href="<?php echo e(route('portal.condominium.user.show',['id' => $row->id])); ?>"
                                           title="Visualizar"
                                           class="btn btn-icon bg-success waves-effect waves-light">
                                            <i class="icon wb-zoom-in" aria-hidden="true"></i>
                                        </a>
                                        <?php if (app('Illuminate\Contracts\Auth\Access\Gate')->check('update', $row)): ?>
                                        <a href="<?php echo e(route('portal.condominium.user.edit',['id' => $row->id])); ?>"
                                           title="Editar"
                                           class="btn btn-icon bg-warning waves-effect waves-light">
                                            <i class="icon wb-edit" aria-hidden="true"></i>
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </div>
            <?php else: ?>
                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3 class="page-title text-center padding-top-20">
                                    Nenhum integrante vinculado a este condomínio.
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if(session()->get('admin') == 'y'): ?>
    <a href="<?php echo e(route('portal.condominium.user.create')); ?>" title="Cadastrar"
       class="site-action site-floataction btn-raised btn btn-success btn-floating"
       data-toggle="tooltip"
       data-original-title="Cadastrar">
        <i class="icon md-plus" aria-hidden="true"></i>
    </a>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>