<?php $__env->startSection('content'); ?>
    <div class="def-100 m-top-100">
        <div class="def-center">
            <span class="def-100 f-w-400 color-grey f-size-14">
                Home : <b class="color-green f-w-600">Benefícios</b>
            </span>
        </div>
    </div>
    <div class="def-100 m-top-30">
        <div class="def-center">
            <h1 class="def-100 f-w-600 color-grey f-size-24">BENEFÍCIOS</h1>
        </div>
    </div>
    <div class="def-100 p-bottom-180 bx-image-city p-top-1024-0 p-bottom-1024-30">
        <div class="def-center">
            <?php echo $__env->make('site.beneficios_list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.layouts.site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>