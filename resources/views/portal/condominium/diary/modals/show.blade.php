<div class="row">
    <div class="col-md-12">
        <label for="user_condominium_id"><strong>Responsável</strong></label>
        <p class="form-control-static">{!! $dados->userCondominium->user->name !!}</p>
    </div>
</div>
@if(isset($dados->reason) && !empty($dados->reason))
<div class="row">
    <div class="col-md-12">
        <label for="reason"><strong>Motivo</strong></label>
        <p class="form-control-static">{!! $dados->reason !!}</p>
    </div>
</div>
@endif
<div class="row">
    <div class="col-md-6">
        <label for="reserve_area_id"><strong>Área Comum</strong></label>
        <p class="form-control-static">{!! $dados->reserveArea->name !!}</p>
    </div>
    <div class="col-md-6">
        <label for="assunto"><strong>Data</strong></label>
        <p class="form-control-static">{!! $dados->date !!}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <label for="reserve_area_id"><strong>Hora Início</strong></label>
        <p class="form-control-static">{!! $dados->start_time !!}</p>
    </div>
    <div class="col-md-6">
        <label for="assunto"><strong>Hora Fim</strong></label>
        <p class="form-control-static">{!! $dados->end_time !!}</p>
    </div>
</div>
@if(isset($dados->description) && !empty($dados->description))
<div class="row">
    <div class="col-md-12">
        <label for="reserve_area_id"><strong>Observação</strong></label>
        <p class="form-control-static">{!! nl2br($dados->description) !!}</p>
    </div>
</div>
@endif
<div class="row">
    <div class="col-md-12">
        <label for="reserve_area_id"><strong>Administrador Notificado</strong></label>
        <p class="form-control-static">@if($dados->notify == 'y') Sim @else Não @endif</p>
    </div>
</div>
<div class="form-group text-right">
    <a class="btn btn-dark waves-effect waves-light" data-dismiss="modal" href="javascript:void(0)">Cancelar</a>
</div>