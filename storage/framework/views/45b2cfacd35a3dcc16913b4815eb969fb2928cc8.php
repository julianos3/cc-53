<div class="row">
    <div class="col-md-12">
        <label for="assunto"><strong>Assunto</strong></label>
        <p class="form-control-static"><?php echo e($dados['subject']); ?></p>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <label for="codigo"><strong>Código</strong></label>
        <p class="form-control-static">Nº: <?php echo e($dados['id']); ?></p>
    </div>
    <div class="col-md-4">
        <label for="codigo"><strong>Tipo</strong></label>
        <p class="form-control-static"><?php echo e($dados['calledCategory']['name']); ?></p>
    </div>
    <div class="col-md-4">
        <label for="assunto"><strong>Criado Por</strong></label>
        <p class="form-control-static"><?php echo e($dados['userCondominium']['user']['name']); ?></p>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <label for="assunto"><strong>Data de Abertura</strong></label>
        <p class="form-control-static"><?php echo e(date('d/m/Y h:i', strtotime($dados['created_at']))); ?></p>
    </div>
</div>
<hr>
<?php if($dados['calledHistoric']): ?>
    <h4>Andamento:</h4>
    <?php
    $total = $dados['calledHistoric']->count();
    $cont = 0;
    ?>
    <?php $__currentLoopData = $dados['calledHistoric']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <?php $cont++; ?>
        <div class="row">
            <div class="col-md-12">
                CRIADO EM <?php echo e(date('d/m/Y h:i', strtotime($row['created_at']))); ?>

                POR <strong><?php echo e($row['userCondominium']['user']['name']); ?></strong>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php echo nl2br($row->description); ?><br />
                <?php if($total > $cont): ?>
                    ----------------------------------------------------------------------------------------------------
                <?php endif; ?>
            </div>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <hr>
<?php endif; ?>
<div class="row">
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
    <div class="col-md-6">
        <div class="form-group">
            <label for="called_status_id">Status:</label>
            <select class="form-control" required="required" id="called_status_id" name="called_status_id">
                <option value="">Selecione</option>
                <?php $__currentLoopData = $calledStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($row->id); ?>" <?php if(isset($dados['called_status_id']) && $dados['called_status_id'] == $row['id']): ?> selected <?php endif; ?>><?php echo e($row->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('description_historic', 'Descrição:'); ?>

            <?php echo Form::textarea('description_historic', null, ['class'=>'form-control', 'required' => 'required']); ?>

            <span class="help-block text-primary">* Informação será adicionada no andamento do chamado.</span>
        </div>
    </div>
</div>