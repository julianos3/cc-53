<option value="">Selecione</option>
<?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <option value="<?php echo e($provider->id); ?>" <?php if(isset($dados->provider_id) && $dados->provider_id == $provider->id): ?> selected <?php endif; ?>><?php echo e($provider->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>