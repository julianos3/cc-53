

<?php $__env->startSection('content'); ?>

    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title"><?php echo e($config['title']); ?></h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="<?php echo e(route('portal.home.index')); ?>">Home</a></li>
                <li class="active">Meus Condomínios</li>
            </ol>
        </div>
        <div class="page-content">
            <?php if($dados->toArray()): ?>
                <div class="row">
                <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <div class="col-md-3">
                    <div class="widget widget-shadow text-center">
                        <div class="widget-header">
                            <div class="widget-header-content">
                                <a class="avatar avatar-lg" href="javascript:void(0)">
                                    <img src="<?php echo e(asset('portal/global/portraits/5.jpg')); ?>" alt="<?php echo e($row->condominium->name); ?>">
                                </a>
                                <h5 class="profile-user"><?php echo e($row->condominium->name); ?></h5>
                                <p class="profile-job"><?php echo e($row->condominium->finality->name); ?></p>
                                <p>
                                    <?php if(isset($row->condominium->address)): ?>
                                        <?php echo e($row->condominium->address); ?>

                                    <?php endif; ?>
                                    <?php if(isset($row->condominium->number)): ?>
                                        <?php echo e(', nº '.$row->condominium->number); ?>

                                    <?php endif; ?>
                                    <?php if(isset($row->condominium->district)): ?>
                                        <?php echo e(', Bairro '.$row->condominium->district); ?>

                                    <?php endif; ?>
                                    <?php if(isset($row->condominium->complement)): ?>
                                        <?php echo e(', Complemento '.$row->condominium->complement); ?>

                                    <?php endif; ?>
                                    <?php if(isset($row->condominium->zip_code)): ?>
                                        <?php echo e(', '.$row->condominium->zip_code); ?>

                                    <?php endif; ?>
                                </p>
                                <a href="<?php echo e(route('portal.condominium.access', ['id' => $row->condominium->id])); ?>"
                                   title="Acessar"
                                   class="btn btn-icon bg-success waves-effect waves-light">
                                    <i class="icon wb-zoom-in" aria-hidden="true"></i>
                                    Acessar
                                </a>
                                <a href="<?php echo e(route('portal.condominium.edit', ['id' => $row->condominium->id])); ?>"
                                   title="Editar"
                                   class="btn btn-icon bg-warning waves-effect waves-light">
                                    <i class="icon wb-edit" aria-hidden="true"></i>
                                    Editar
                                </a>
                            </div>
                        </div>
                        <div class="widget-footer">
                            <div class="row no-space">
                                <div class="col-xs-12">
                                    <strong class="profile-stat-count">260</strong>
                                    <span>Integrantes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="page-title text-center padding-top-20">
                            Nenhum cadastro realizado.
                        </h3>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <a href="<?php echo e(route('portal.condominium.create')); ?>" title="Criar Condomínio"
       data-toggle="tooltip"
       data-original-title="Criar Condomínio"
       class="site-action site-floataction btn-raised btn btn-success btn-floating">
        <i class="icon md-plus" aria-hidden="true"></i>
    </a>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>