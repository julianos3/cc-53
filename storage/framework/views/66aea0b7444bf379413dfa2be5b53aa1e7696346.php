<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('date', 'Data realização *'); ?>

            <?php echo Form::text('date', null, ['class'=>'form-control', 'required' => 'required', 'data-plugin' => 'formatter', 'data-pattern' => '[[99]]/[[99]]/[[9999]]', 'data-plugin' => 'datepicker', 'placeholder' => '00/00/0000']); ?>

        </div>
    </div>
    <div class="col-md-6">
        <label for="provider_id">Fornecedor *</label>
        <div class="input-group input-group-icon">
            <select class="form-control" required="required" id="provider_id" name="provider_id">
                <option value="">Selecione</option>
                <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($provider->id); ?>" <?php if(isset($dados->provider_id) && $dados->provider_id == $provider->id): ?> selected <?php endif; ?>><?php echo e($provider->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
            <span class="input-group-btn">
                <button type="button"
                        data-target="#modalCreate" data-toggle="modal"
                        data-title="Cadastrar Fornecedor"
                        data-route="<?php echo e(route('portal.condominium.provider.createAjax')); ?>"
                        class="btn btn-primary waves-effect waves-light btnCreateModal">
                    <i class="icon md-plus"></i>
                </button>
            </span>
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