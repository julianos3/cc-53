<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('name', 'Nome *'); ?>

            <?php echo Form::text('name', null, ['class'=>'form-control', 'required' => 'required']); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="unit_id">Unidade vinculada a garagem</label>
            <select class="form-control" name="unit_id" id="unit_id">
                <option value="">Selecione</option>
                <?php $__currentLoopData = $unit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($row->id); ?>"
                            <?php if(isset($dados['unit_id']) && $dados['unit_id'] == $row->id): ?> selected <?php endif; ?>><?php echo e($row->block->name . ' - ' .$row->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('description', 'Descrição:'); ?>

            <?php echo Form::textarea('description', null, ['class'=>'form-control', 'rows' => '5']); ?>

        </div>
    </div>
</div>