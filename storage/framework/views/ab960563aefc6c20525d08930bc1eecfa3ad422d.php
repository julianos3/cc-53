<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('subject', 'Assunto *'); ?>

            <?php echo Form::text('subject', null, ['class'=>'form-control', 'required' => 'required']); ?>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('message', 'Mensagem *'); ?>

            <?php echo Form::textarea('message', null, ['class'=>'form-control', 'required' => 'required']); ?>

        </div>
    </div>
</div>