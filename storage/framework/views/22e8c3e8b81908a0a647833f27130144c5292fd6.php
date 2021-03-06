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
                    <li><span><?php echo e($config['action']); ?></span></li>
                </ol>

                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
            </div>
        </header>
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title"><?php echo e($config['title'].' > '.$config['action']); ?></h2>
            </header>
            <?php echo Form::open(['route'=>'admin.tags.store', 'files'=> true]); ?>

            <div class="panel-body">

                <?php echo $__env->make('admin.layouts._msg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="row">
                    <div class="col-sm-12 text-right">
                        <a href="<?php echo e(route('admin.tags.index')); ?>" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-undo"></i> Voltar</a>
                    </div>
                </div>

                <?php echo $__env->make('admin.tags._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            </div>
            <footer class="panel-footer text-right">
                <button type="submit"
                        class="btn btn-raised btn-success waves-effect waves-light">
                    <i class="icon wb-plus" aria-hidden="true"></i>
                    Cadastrar
                </button>
            </footer>
            <?php echo Form::close(); ?>

        </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>