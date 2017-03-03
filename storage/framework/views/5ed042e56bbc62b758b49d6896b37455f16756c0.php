<div class="row">
    <div class="col-sm-12 text-right">
        <a href="<?php echo e(route('admin.blog.tags.index', ['id' => $idRoute])); ?>" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-tags"></i> Tags</a>
        <a href="<?php echo e(route('admin.blog.galery.index', ['id' => $idRoute])); ?>" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-image"></i> Galeria</a>
        <a href="<?php echo e($routeBack); ?>" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-undo"></i> Voltar</a>
    </div>
</div>