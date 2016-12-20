<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('Name', 'Nome:'); ?>

            <?php echo Form::text('name', null, ['class'=>'form-control', 'required' => 'required']); ?>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="provider_category_id">Categoria:</label>
            <select class="form-control" required="required" id="provider_category_id" name="provider_category_id">
                <option value="">Selecione</option>
                <?php $__currentLoopData = $providerCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($category->id); ?>" <?php if(isset($dados['provider_category_id']) && $dados['provider_category_id'] == $category['id']): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('Ativo', 'Ativo:'); ?>

            <?php echo Form::select('active', ['y' => 'Sim','n' => 'Não'], null, ['class'=>'form-control', 'required' => 'required']); ?>

        </div>
    </div>
</div>
<div class="form-group">
    <?php echo Form::label('descrição', 'Descrição:'); ?>

    <?php echo Form::textarea('description', null, ['class'=>'form-control']); ?>

</div>