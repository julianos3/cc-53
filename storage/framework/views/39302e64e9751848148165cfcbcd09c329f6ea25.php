<div class="row">
    <div class="col-md-12">
        <label for="user_condominium_id"><strong>Responsável</strong></label>
        <p class="form-control-static"><?php echo $dados->userCondominium->user->name; ?></p>
    </div>
</div>
<?php if(isset($dados->reason) && !empty($dados->reason)): ?>
<div class="row">
    <div class="col-md-12">
        <label for="reason"><strong>Motivo</strong></label>
        <p class="form-control-static"><?php echo $dados->reason; ?></p>
    </div>
</div>
<?php endif; ?>
<div class="row">
    <div class="col-md-6">
        <label for="reserve_area_id"><strong>Área Comum</strong></label>
        <p class="form-control-static"><?php echo $dados->reserveArea->name; ?></p>
    </div>
    <div class="col-md-6">
        <label for="assunto"><strong>Data</strong></label>
        <p class="form-control-static"><?php echo $dados->date; ?></p>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="reserve_area_id"><strong>Hora Início</strong></label>
        <p class="form-control-static"><?php echo $dados->start_time; ?></p>
    </div>
    <div class="col-md-6">
        <label for="assunto"><strong>Hora Fim</strong></label>
        <p class="form-control-static"><?php echo $dados->end_time; ?></p>
    </div>
</div>
<?php if(isset($dados->description) && !empty($dados->description)): ?>
<div class="row">
    <div class="col-md-12">
        <label for="reserve_area_id"><strong>Observação</strong></label>
        <p class="form-control-static"><?php echo nl2br($dados->description); ?></p>
    </div>
</div>
<?php endif; ?>
<div class="row">
    <div class="col-md-12">
        <label for="reserve_area_id"><strong>Administrador Notificado</strong></label>
        <p class="form-control-static"><?php if($dados->notify == 'y'): ?> Sim <?php else: ?> Não <?php endif; ?></p>
    </div>
</div>
<div class="form-group text-right">
    <a class="btn btn-dark waves-effect waves-light" data-dismiss="modal" href="javascript:void(0)">Cancelar</a>
</div>