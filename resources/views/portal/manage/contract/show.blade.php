<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="font-weight-bold">Serviço:</label>
            <p>{{ $dados->name }}</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold">Data ínicio:</label>
            <p>{{ $dados->start_date }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold">Data fim:</label>
            <p>{{ $dados->end_date }}</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold">Fornecedor:</label>
            <p>{{ $dados->provider->name }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold">Status:</label>
            <p>{{ $dados->contractStatus->name }}</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="font-weight-bold">Descrição:</label>
            <p>{{ $dados->description }}</p>
        </div>
    </div>
</div> /