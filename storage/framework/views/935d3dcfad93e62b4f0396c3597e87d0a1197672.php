

<?php $__env->startSection('content'); ?>

    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title"><?php echo e($config['title']); ?></h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="<?php echo e(route('portal.home.index')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('portal.condominium.index')); ?>">Condomínio</a></li>
                <li><a href="<?php echo e(route('portal.condominium.security-cam.index')); ?>">Câmeras de Segurança</a></li>
                <li class="active"><?php echo e($config['title']); ?></li>
            </ol>
        </div>

        <div class="page-content container-fluid">
        <?php
        $urlBack = route('portal.condominium.security-cam.index');
        ?>
        <?php echo $__env->make('portal.layouts.btn_black', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php if(!$dados->isEmpty()): ?>
            <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="col-lg-4 col-sm-6">
                <div class="widget widget-shadow" id="widgetLineareaOne">
                    <div class="widget-content">
                        <div class="padding-20 padding-top-10">
                            <h4><?php echo e($row->name); ?></h4>
                            <!--
                            <iframe width="100%" src="<?php echo e($row->url); ?>" frameborder="0" allowfullscreen></iframe>
                            -->
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <?php else: ?>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-title">
                        <br />
                        Nenhuma câmera encontrada.
                    </h4>
                </div>
            </div>
        <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>