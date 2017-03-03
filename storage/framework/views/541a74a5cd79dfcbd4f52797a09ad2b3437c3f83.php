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

            <?php echo Form::open(['route'=>'admin.blog.tags.store', 'files'=> true]); ?>

                <div class="panel-body">

                    <?php echo $__env->make('admin.layouts._msg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('admin.modals._delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php
                    $idRoute = $id;
                    $routeBack = route('admin.blog.edit', ['id' => $id]);
                    ?>

                    <?php echo $__env->make('admin.blog.inc.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php echo $__env->make('admin.blog._form_tags', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                </div>
                <footer class="panel-footer text-right">
                    <button type="submit"
                            class="btn btn-raised btn-success waves-effect waves-light">
                        <i class="icon wb-plus" aria-hidden="true"></i>
                        Adicionar Tag
                    </button>
                </footer>
            <?php echo Form::close(); ?>

        </section>

        <?php if(!$dados->isEmpty()): ?>
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Tags</h2>
            </header>
            <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped table-condensed mb-none">
                            <thead>
                            <tr>
                                <th>Tag</th>
                                <th class="col-md-2 text-center">Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><?php echo e($row->tags->name); ?></td>
                                    <td class="actions text-center">
                                        <a href="#modalAnim" data-route="<?php echo e(route('admin.blog.tags.destroy', ['id' => $row->id])); ?>" class="on-default excluir remove-row" title="Excluir">
                                            <i class="fa fa-trash-o"></i>
                                            Excluir
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>