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
        <section class="panel media-gallery">
            <header class="panel-heading">
                <h2 class="panel-title"><?php echo e($config['title']); ?></h2>
            </header>
            <div class="panel-body">

                <?php echo $__env->make('admin.layouts._msg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('admin.modals._delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('admin.modals._gallery', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php
                $idRoute = $id;
                $routeBack = route('admin.blog.edit', ['id' => $id]);
                ?>

                <?php echo $__env->make('admin.blog.inc.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="row cadImage" style="margin: 20px 0;">
                    <div class="col-sm-12 center">
                        <form>
                            <input id="file_upload" name="file_upload" class="mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block" type="file" multiple="true">
                            <div id="queue"></div>
                            <a class="mb-xs mt-xs mr-xs btn btn-danger" href="javascript:$('#file_upload').uploadifive('upload')"><i class="fa fa-image"></i> Upload Imagem</a>
                        </form>
                    </div>
                </div>

                <?php if(!$dados->isEmpty()): ?>
                <div class="row mg-files" data-sort-destination data-sort-id="media-gallery">
                    <ul class="sortable col-sm-12" data-route="<?php echo e(route('admin.blog.galery.order', ['id' => $id])); ?>">
                        <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li class="lisort col-sm-3 div_<?php echo e($row->id); ?>" id="item_<?php echo e($row->id); ?>">
                            <div class="isotope-item document">
                                <div class="thumbnail">
                                    <div class="thumb-preview">
                                        <a class="thumb-image" href="<?php echo e(asset('uploads/blog/'.$row->image)); ?>" style="height: 221px; background: url('<?php echo e(asset('uploads/blog/'.$row->image)); ?>'); -webkit-background-size: cover;background-size: cover;"></a>
                                        <div class="mg-thumb-options">
                                            <div class="mg-zoom">
                                                <i class="fa fa-search"></i>
                                            </div>
                                            <div class="mg-toolbar">
                                                <div class="mg-group pull-right">
                                                    <a href="#modalForm" data-id="<?php echo e($row->id); ?>" data-route="<?php echo e(route('admin.blog.galery.updateLabel', ['id' => $row->id])); ?>" class="modal-form btnEditLabel">EDITAR</a>
                                                    <button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
                                                        <i class="fa fa-caret-up"></i>
                                                    </button>
                                                    <ul class="dropdown-menu mg-menu" role="menu">
                                                        <li><a href="#modalAnim" data-route="<?php echo e(route('admin.blog.galery.destroy', ['id' => $row->id])); ?>" class="excluir" data-id="<?php echo $id; ?>"><i class="fa fa-trash-o"></i> Delete</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="mg-title text-semibold text-right col-md-12">
                                        CAPA
                                        <input type="checkbox" data-route="<?php echo e(route('admin.blog.galery.cover', ['id' => $row->id])); ?>" <?php if($row->cover == 'y'){echo 'checked="checked"';} ?> class="cover" data-id="<?php echo e($row->id); ?>" data-id-album="<?php echo e($id); ?>" name="capa" />
                                    </h5>
                                    <div class="mg-description">
                                        <small class="pull-left text-muted legenda" data-id="<?php echo e($row->id); ?>"><?php echo e($row->label); ?></small>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>