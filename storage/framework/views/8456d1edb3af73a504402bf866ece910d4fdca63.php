<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('name', 'Título:'); ?>

            <?php echo Form::text('name', null, ['class'=>'form-control', 'required' => 'required']); ?>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('description', 'Comunicado:'); ?>

            <?php echo Form::textarea('description', null, ['class'=>'form-control', 'required' => 'required']); ?>

        </div>
    </div>
</div>

<h4>Destinatários</h4>
<?php if($paginaAlterar): ?>
<div class="row">
    <div class="col-md-12">
        <?php if($dados['all_user'] == 'y'): ?>
            <label for="destination">Enviado a todos os integrantes do condomínio</label>
        <?php else: ?>
            <label for="destination"><strong>Enviado a todos os integrantes dos grupos:</strong></label><br />
            <?php $__currentLoopData = $groupCommunication; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php echo $row->groupCondominium->name."<br />"; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <br />
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12 alert alert-warning">
        <?php if($dados->send_mail == 'y'): ?>
        Comunicados enviados por e-mails!<br />
        <?php endif; ?>
        Ao editar o comunicado será enviada uma notificação para os integrantes vinculados.
    </div>
</div>
<?php else: ?>
<div class="row">
    <div class="col-md-12">
        <div class="form-group form-material">
            <div class="radio-custom radio-default radio-inline">
                <input type="radio" class="communicationDestination" id="condominiumAll" name="destination" value="all_user" checked="" required="required">
                <label for="condominiumAll">Enviar comunicado para TODOS os integrantes do condomínio</label>
            </div>
            <br/>
            <div class="radio-custom radio-default radio-inline">
                <input type="radio" class="communicationDestination" id="group" name="destination" value="group" required="required">
                <label for="group">Enviar comunicado para GRUPOS</label>
            </div>
        </div>
    </div>
</div>
<div class="row groupsCommunication none">
    <div class="col-md-12">
        <div class="form-group">
            <label for="groups">Grupos:</label>
            <!--
            <select data-plugin="selectpicker" class="form-control selectGroup" name="groups[]" multiple data-selected-text-format="count > 3">
                <?php $__currentLoopData = $groupCondominium; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
            -->
            <select data-plugin="selectpicker" class="form-control selectGroup" name="groups[]" multiple data-selected-text-format="count > 3">
                <?php $__currentLoopData = $groupCondominium; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
        </div>
    </div>
</div>
<?php endif; ?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('date_display', 'Data limite de exibição:'); ?>

            <?php echo Form::text('date_display', null, ['class'=>'form-control', 'required' => 'required', 'data-plugin' => 'formatter', 'data-pattern' => '[[99]]/[[99]]/[[9999]]', 'data-plugin' => 'datepicker', 'placeholder' => '00/00/0000']); ?>

        </div>
    </div>
    <?php if(!$paginaAlterar): ?>
    <div class="col-md-6">
        <div class="checkbox-custom checkbox-primary"><br/>
            <input type="checkbox" id="send_mail" name="send_mail" value="y" checked="">
            <label for="send_mail">Enviar o comunicado por e-mail para os destinatários.</label>
        </div>
    </div>
    <?php endif; ?>
</div>