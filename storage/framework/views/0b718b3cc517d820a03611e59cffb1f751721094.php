<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label" for="notification_email">Desejo que o Central Condo me notifique por e-mail eventos relacionados a mim: *</label>
            <select class="form-control" name="notification_email" id="notification_email" required="required">
                <option value="y" <?php if($dados->user->notification_email == 'y'): ?> selected <?php endif; ?>>Sim, receber</option>
                <option value="n" <?php if($dados->user->notification_email == 'n'): ?> selected <?php endif; ?>>Não receber</option>
            </select>
        </div>
    </div>
</div>
<input type="hidden" name="user_id" value="<?php echo e($dados->user_id); ?>" />
<div class="alert alert-info">
    O envio de e-mail é muito importante para que você fique por dentro do que ocorre no <strong>Central Condo.</strong>
</div>


