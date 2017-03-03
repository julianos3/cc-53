<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('name', 'Responsável:'); ?>

            <?php echo Form::text('name', Auth::user()->name, ['class'=>'form-control', 'readOnly' => 'readOnly', 'required' => 'required']); ?>

        </div>
    </div>
</div>
<?php if(isset($dados->user_condominium_id)): ?>
<input type="hidden" name="user_condominium_id" value="<?php echo e($dados->user_condominium_id); ?>" />
<?php endif; ?>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('reason', 'Motívo:'); ?>

            <?php echo Form::text('reason', null, ['class'=>'form-control']); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('reserve_area_id', 'Área Comum: *'); ?>

            <select class="form-control" required="required" name="reserve_area_id">
                <option value="">Selecionar</option>
                <?php if(!$reserveAreas->isEmpty()): ?>
                    <?php $__currentLoopData = $reserveAreas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserveArea): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo e($reserveArea->id); ?>"
                                <?php if(isset($dados->reserve_area_id) && $dados->reserve_area_id == $reserveArea->id): ?> selected <?php endif; ?>><?php echo e($reserveArea->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('date', 'Data: *'); ?>

            <div class="input-group">
                <?php echo Form::text('date', null, ['class'=>'form-control', 'id' => 'date', 'data-plugin' => 'datepicker', 'placeholder' => '99/99/9999', 'required' => 'required']); ?>

                <span class="input-group-addon">
                    <i class="icon md-calendar" aria-hidden="true"></i>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('start_time', 'Hora Início: *'); ?>

            <?php echo Form::text('start_time', null, ['class'=>'form-control', 'data-plugin' => 'formatter', 'data-pattern' => '[[99]]:[[99]]', 'placeholder' => '99:99', 'required' => 'required']); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('end_time', 'Hora Fim: *'); ?>

            <?php echo Form::text('end_time', null, ['class'=>'form-control', 'data-plugin' => 'formatter', 'data-pattern' => '[[99]]:[[99]]', 'placeholder' => '99:99:99', 'required' => 'required']); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('description', 'Observação:'); ?>

            <?php echo Form::textarea('description', null, ['class'=>'form-control', 'rows' => '4']); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('notify', 'Notificar administrador? *'); ?>

            <?php echo Form::select('notify', ['n' => 'Não', 'y' => 'Sim'], null, ['class'=>'form-control', 'placeholder' => 'Selecione', 'required' => 'required']); ?>

        </div>
    </div>
</div>