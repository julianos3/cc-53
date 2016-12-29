<div class="form-group">
    {!! Form::label('name', 'Serviço *') !!}
    {!! Form::text('name', null, ['class'=>'form-control', 'required' => 'required']) !!}
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('start_date', 'Data início *') !!}
            {!! Form::text('start_date', null, ['class'=>'form-control', 'required' => 'required', 'data-plugin' => 'formatter', 'data-pattern' => '[[99]]/[[99]]/[[9999]]', 'data-plugin' => 'datepicker', 'placeholder' => '00/00/0000']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('end_date', 'Data Fim *') !!}
            {!! Form::text('end_date', null, ['class'=>'form-control', 'required' => 'required', 'data-plugin' => 'formatter', 'data-pattern' => '[[99]]/[[99]]/[[9999]]', 'data-plugin' => 'datepicker', 'placeholder' => '00/00/0000']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="provider_id">Fornecedor *</label>
            <select class="form-control" required="required" id="provider_id" name="provider_id">
                <option value="">Selecione</option>
                @foreach($providers as $provider)
                    <option value="{{ $provider->id }}" @if(isset($dados['provider_id']) && $dados['provider_id'] == $provider->id) selected @endif>{{ $provider->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="contract_status_id">Status *</label>
            <select class="form-control" required="required" id="contract_status_id" name="contract_status_id">
                <option value="">Selecione</option>
                @foreach($status as $stats)
                    <option value="{{ $stats->id }}" @if(isset($dados['contract_status_id']) && $dados['contract_status_id'] == $stats->id) selected @endif>{{ $stats->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('description', 'Descrição') !!}
            {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>

{!! Form::file('files[]', array('multiple'=>true)) !!}