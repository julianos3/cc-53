<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('date', 'Data realização *') !!}
            {!! Form::text('date', null, ['class'=>'form-control', 'required' => 'required', 'data-plugin' => 'formatter', 'data-pattern' => '[[99]]/[[99]]/[[9999]]', 'data-plugin' => 'datepicker', 'placeholder' => '00/00/0000']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <label for="provider_id">Fornecedor *</label>
        <div class="input-group input-group-icon">
            <select class="form-control" required="required" id="provider_id" name="provider_id">
                <option value="">Selecione</option>
                @foreach($providers as $provider)
                    <option value="{{ $provider->id }}" @if(isset($dados->provider_id) && $dados->provider_id == $provider->id) selected @endif>{{ $provider->name }}</option>
                @endforeach
            </select>
            <span class="input-group-btn">
                <button type="button"
                        data-target="#modalCreate" data-toggle="modal"
                        data-title="Cadastrar Fornecedor"
                        data-route="{{ route('portal.condominium.provider.createAjax') }}"
                        class="btn btn-primary waves-effect waves-light btnCreateModal">
                    <i class="icon md-plus"></i>
                </button>
            </span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('description', 'Observação') !!}
            {!! Form::textarea('description', null, ['class'=>'form-control', 'rows' => 4]) !!}
        </div>
    </div>
</div>
<input type="hidden" name="maintenance_id" value="" id="maintenanceId" />