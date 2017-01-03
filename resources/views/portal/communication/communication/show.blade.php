<div class="row">
    <div class="col-md-4">
        <label for="codigo"><strong>Código</strong></label>
        <p class="form-control-static">Nº: {{ $dados->id }}</p>
    </div>
    <div class="col-md-4">
        <label for="codigo"><strong>Criado Por</strong></label>
        <p class="form-control-static">{{ $dados->userCondominium->user->name.' | '.$dados->userCondominium->userRoleCondominium->name }}</p>
    </div>
    <div class="col-md-4">
        <label for="codigo"><strong>Data Criado</strong></label>
        <p class="form-control-static">{{ date('d/m/Y', strtotime($dados->created_at)) }}</p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <label for="codigo"><strong>Título</strong></label>
        <p class="form-control-static">{{ $dados->name}}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <label for="codigo"><strong>Descrição</strong></label>
        <p class="form-control-static">{{ $dados->description }}</p>
    </div>
</div>