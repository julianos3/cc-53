
<?php echo Form::model($dados, ['route'=>['portal.condominium.user.unit.create']]); ?>

<div class="alert alert-info alert-dismissible" role="alert">
    INFORMAÇÃO : Informe abaixo as unidades que pertencem ao integrante do condomínio.
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="block_id">Bloco</label>
            <select class="form-control" name="block_id" id="block_id" required="required">
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
            <select class="form-control" name="unit_id" id="unit_id" required="required">
                <option value="">Selecione</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label" for="user_unit_role_id">Tipo de vinculo com a Unidade</label>
            <select class="form-control" name="user_unit_role_id" id="user_unit_role_id" required="required">
                <option value="">Selecione</option>
                <?php $__currentLoopData = $userRole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
        </div>
    </div>
</div>
<input type="hidden" name="user_condominium_id" id="user_condominium_id" value="<?php echo e($userCondominiumId); ?>"/>
<div class="row">
    <div class="col-md-12 text-right">
        <button type="submit" class="btn btn-primary waves-effect waves-light" id="addUnitUser">
            <i class="icon wb-plus"></i>
            Adicionar
        </button>
    </div>
</div>

<?php echo Form::close(); ?>