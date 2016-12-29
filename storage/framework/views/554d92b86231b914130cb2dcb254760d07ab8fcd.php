<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('Name', 'Nome *'); ?>

            <?php echo Form::text('name', null, ['class'=>'form-control', 'required' => 'required']); ?>

        </div>
    </div>
    <div class="col-md-6">

        <div class="form-group">
            <?php echo Form::label('floor', 'Andar'); ?>

            <?php echo Form::text('floor', null, ['class'=>'form-control']); ?>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="block_id">Bloco *</label>
            <select class="form-control" name="block_id" id="block_id" required="required">
                <option value="">Selecione</option>
                <?php $__currentLoopData = $block; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($row->id); ?>"
                            <?php if(isset($dados['block_id']) && $dados['block_id'] == $row->id): ?> selected <?php endif; ?>><?php echo e($row->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="unit_type_id">Tipo *</label>
            <select class="form-control" name="unit_type_id" id="unit_type_id" required="required">
                <option value="">Selecione</option>
                <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($row->id); ?>"
                            <?php if(isset($dados['unit_type_id']) && $dados['unit_type_id'] == $row->id): ?> selected <?php endif; ?>><?php echo e($row->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
        </div>
    </div>
</div>