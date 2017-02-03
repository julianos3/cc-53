<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('password', 'Senha atual: *'); ?>

            <input type="password" class="form-control" id="password" name="password" required />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('new_password', 'Nova Senha: *'); ?>

            <input type="password" class="form-control" id="new_password" name="new_password" required />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <?php echo Form::label('repeat_new_password', 'Repetir Nova Senha: *'); ?>

            <input type="password" class="form-control" id="repeat_new_password" name="repeat_new_password" required />
        </div>
    </div>
</div>
