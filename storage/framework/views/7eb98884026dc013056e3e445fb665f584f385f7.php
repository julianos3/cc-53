<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('Name', 'Nome: *'); ?>

            <?php echo Form::text('name', null, ['class'=>'form-control', 'required' => 'required']); ?>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('Email', 'E-mail: *'); ?>

            <?php echo Form::text('email', null, ['class'=>'form-control', 'required' => 'required']); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="user_role_condominium_id">Tipo de relação com o condoḿinio: *</label>
            <select class="form-control" name="user_role_condominium_id" id="user_role_condominium_id" required="required">
                <option value="">Selecione</option>
                <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($row->id); ?>" ><?php echo e($row->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p class="alert alert-info">
            É muito importante informar um e-mail válido, pois através dele é que o
            integrante irá acessar o Central Condo, além de ser avisado sobre os acontecimentos
            do condomínio.
        </p>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('Sexo', 'Sexo:'); ?>

            <?php echo Form::select('sex', ['m' => 'Masculino','f' => 'Feminino'], null, ['class'=>'form-control']); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('phone', 'Telefone:'); ?>

            <?php echo Form::text('phone', null, ['class'=>'form-control', 'data-plugin' => 'formatter', 'data-pattern' => '([[99]]) [[9999]]-[[99999]]', 'placeholder' => '(99) 9999-99999']); ?>

        </div>
    </div>
</div>

<hr>
<h4 class="title">Informe abaixo caso o integrante possua alguma unidade do condomínio</h4>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="block_id">Bloco</label>
            <select class="form-control" name="block_id" id="block_id">
                <option value="">Selecione</option>
                <?php $__currentLoopData = $block; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="unit_id">Unidade</label>
            <select class="form-control" name="unit_id" id="unit_id">
                <option value="">Selecione</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label" for="user_unit_role_id">Tipo de vinculo com a Unidade</label>
            <select class="form-control" name="user_unit_role_id" id="user_unit_role_id">
                <option value="">Selecione</option>
                <?php $__currentLoopData = $userRole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
        </div>
    </div>
</div>
