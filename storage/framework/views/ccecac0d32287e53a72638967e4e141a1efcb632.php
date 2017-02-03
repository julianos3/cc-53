<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="font-weight-bold">Serviço:</label>
            <p><?php echo e($dados->name); ?></p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold">Data ínicio:</label>
            <p><?php echo e($dados->start_date); ?></p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold">Data fim:</label>
            <p><?php echo e($dados->end_date); ?></p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold">Fornecedor:</label>
            <p><?php echo e($dados->provider->name); ?></p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold">Status:</label>
            <p><?php echo e($dados->contractStatus->name); ?></p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="font-weight-bold">Descrição:</label>
            <p><?php echo $dados->description; ?></p>
        </div>
    </div>
</div>