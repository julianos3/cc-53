<div class="form-group">
    <?php echo Form::label('Name', 'Nome do Rescurso:'); ?>

    <?php echo Form::text('name', null, ['class'=>'form-control']); ?>

</div>
<div class="form-group">
    <?php echo Form::label('Ativo', 'Ativo:'); ?>

    <?php echo Form::select('active', ['y' => 'Sim','n' => 'Não'], null, ['class'=>'form-control']); ?>

</div>