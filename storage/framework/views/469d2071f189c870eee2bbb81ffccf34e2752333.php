<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('name', 'Nome *'); ?>

            <?php echo Form::text('name', null, ['class'=>'form-control', 'required' => 'required']); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('active', 'Ativo? *'); ?>

            <?php echo Form::select('active', ['y' => 'Sim', 'n' => 'Não'], null, ['class'=>'form-control', 'required' => 'required']); ?>

        </div>
    </div>
</div>
<br />