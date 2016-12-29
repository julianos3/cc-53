<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('date', 'Data realização *'); ?>

            <?php echo Form::text('date', null, ['class'=>'form-control', 'required' => 'required', 'data-plugin' => 'formatter', 'data-pattern' => '[[99]]/[[99]]/[[9999]]', 'data-plugin' => 'datepicker', 'placeholder' => '00/00/0000']); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="provider_id">Fornecedor *</label>
            <select class="form-control" required="required" id="provider_id" name="provider_id">
                <option value="">Selecione</option>
                <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <option value="<?php echo e($provider->id); ?>" <?php if(isset($dados['provider_id']) && $dados['provider_id'] == $provider['id']): ?> selected <?php endif; ?>><?php echo e($provider->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('description', 'Observação'); ?>

            <?php echo Form::textarea('description', null, ['class'=>'form-control', 'rows' => 4]); ?>

        </div>
    </div>
</div>
<input type="hidden" name="maintenance_id" value="" id="maintenanceId" />