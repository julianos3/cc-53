

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
                                        <a href="<?php echo e(route('portal.condominium.user.edit',['id' => $row->id])); ?>"
                                           title="Editar"
                                           class="btn btn-icon bg-warning waves-effect waves-light">
                                            <i class="icon wb-edit" aria-hidden="true"></i>
                                        </a>
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
            <!--
            <div class="panel">
                <div class="panel-body">
                    <form class="page-search-form" role="search" style="display:none;">
                        <div class="input-search input-search-dark">
                            <i class="input-search-icon md-search" aria-hidden="true"></i>
                            <input type="text" class="form-control" id="inputSearch" name="search"
                                   placeholder="Buscar Usuários">
                            <button type="button" class="input-search-close icon md-close" aria-label="Close"></button>
                        </div>
                    </form>

                    <?php echo $__env->make('success._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('errors._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('portal.modals.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <a href="<?php echo e(route('portal.condominium.user.create')); ?>"
                       data-toggle="tooltip"
                       data-original-title="Cadastrar"
                       class="btn btn-primary waves-effect waves-light">
                        <i class="icon wb-plus" aria-hidden="true"></i>
                        Cadastrar
                    </a>

                    <div class="nav-tabs-horizontal">
                        <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
                            <li class="active" role="presentation">
                                <a data-toggle="tab" href="#all_contacts" aria-controls="all_contacts" role="tab">
                                    Todos
                                </a>
                            </li>
                            <li class="dropdown" role="presentation">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                    <span class="caret"></span>Contacts </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a data-toggle="tab" href="#all_contacts"
                                                               aria-controls="all_contacts"
                                                               role="tab">Todos</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane animation-fade active" id="all_contacts" role="tabpanel">

                                <ul class="list-group">
                                    <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <li class="list-group-item">
                                            <div class="media">
                                                <div class="row">
                                                    <div class="media-left col-md-1">
                                                        <?php
                                                            if($row->user->imagem){
                                                                $imgAvatar = route('portal.condominium.user.image', ['id' => $row->user->id, 'image' => $row->user->imagem]);
                                                            }else{
                                                                $imgAvatar = asset('portal/global/portraits/1.jpg');
                                                            }
                                                        ?>
                                                        <div class="avatar" style="height: 50px; background: url('<?php echo e($imgAvatar); ?>') top center; background-size: cover;">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 m-top-w-450-10">
                                                        <h4 class="media-heading">
                                                            <?php echo e($row->user->name); ?>

                                                            <small><?php echo e($row->userRoleCondominium->name); ?></small>
                                                        </h4>
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
                                                    </div>
                                                    <div class="media-right text-center col-md-3">
                                                        <a href="<?php echo e(route('portal.condominium.user.show',['id' => $row->id])); ?>"
                                                           title="Visualizar"
                                                           class="btn btn-icon bg-success waves-effect waves-light waves-effect waves-light">
                                                            <i class="icon wb-zoom-in" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="<?php echo e(route('portal.condominium.user.edit', ['id' => $row->id])); ?>"
                                                           title="Editar"
                                                           class="btn btn-icon bg-warning waves-effect waves-light">
                                                            <i class="icon wb-edit" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </ul>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <?php echo $dados->setPath('')->appends(Request::except('page'))->render(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            -->
        </div>
    </div>
    <a href="<?php echo e(route('portal.condominium.user.create')); ?>" title="Cadastrar"
       class="site-action site-floataction btn-raised btn btn-success btn-floating"
       data-toggle="tooltip"
       data-original-title="Cadastrar">
        <i class="icon md-plus" aria-hidden="true"></i>
    </a>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>