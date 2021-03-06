<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('Assunto', 'Assunto:'); ?>

            <?php echo Form::text('subject', null, ['class'=>'form-control', 'required' => 'required']); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="called_category_id">Categoria:</label>
            <select class="form-control" required="required" id="called_category_id" name="called_category_id">
                <option value="">Selecione</option>
                <?php $__currentLoopData = $calledCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($row->id); ?>" <?php if(isset($dados['called_category_id']) && $dados['called_category_id'] == $row['id']): ?> selected <?php endif; ?>><?php echo e($row->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('descrição', 'Descrição:'); ?>

            <?php echo Form::textarea('description', null, ['class'=>'form-control', 'required' => 'required']); ?>

            <span class="help-block text-primary">* Informação será acrescentada no andamento do chamado.</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('Visivel', 'Permitir que outros integrantes do condomínio vejam o conteúdo deste chamado:'); ?>

            <?php echo Form::select('visible', ['y' => 'Sim','n' => 'Não'], null, ['class'=>'form-control']); ?>

            <span class="help-block text-primary">* Ao permitir que outros vejam, pode evitar que sejam criados outros chamados com o mesmo motivo.</span>
        </div>
    </div>
</div>