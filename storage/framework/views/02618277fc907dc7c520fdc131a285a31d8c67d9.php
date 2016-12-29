<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('name', 'Nome *'); ?>

            <?php echo Form::text('name', null, ['class'=>'form-control', 'required' => 'required']); ?>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('start_date', 'Data início *'); ?>

            <?php echo Form::text('start_date', null, ['class'=>'form-control', 'required' => 'required', 'data-plugin' => 'formatter', 'data-pattern' => '[[99]]/[[99]]/[[9999]]', 'data-plugin' => 'datepicker', 'placeholder' => '00/00/0000']); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="periodicity_id">Periodicidade *</label>
            <select class="form-control" required="required" id="periodicity_id" name="periodicity_id">
                <option value="">Selecione</option>
                <?php $__currentLoopData = $periodicitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $periodicity): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($periodicity->id); ?>" <?php if(isset($dados['periodicity_id']) && $dados['periodicity_id'] == $periodicity->id): ?> selected <?php endif; ?>><?php echo e($periodicity->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('description', 'Observação'); ?>

            <?php echo Form::textarea('description', null, ['class'=>'form-control']); ?>

        </div>
    </div>
</div>