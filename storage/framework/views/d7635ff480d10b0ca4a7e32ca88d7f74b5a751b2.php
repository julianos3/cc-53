<?php if(session()->get('admin') == 'y'): ?>
<?php $__currentLoopData = $messagePerfil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
<div class="col-md-4">
    <div class="alert alert-warning alert-icon alert-dismissible" role="alert">
        <i class="icon wb-alert-circle" aria-hidden="true"></i>
        <h4>Atenção!</h4>
        <p>
            <?php echo e($message['message']); ?>

        </p>
        <p class="margin-top-10">
            <a href="<?php echo e($message['route']); ?>" class="btn btn-warning waves-effect waves-light" type="button">
                <i class="icon wb-check" aria-hidden="true"></i>
                Adicionar
            </a>
        </p>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php endif; ?>