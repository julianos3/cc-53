<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('name', 'Responsável:') !!}
            {!! Form::text('name', Auth::user()->name, ['class'=>'form-control', 'readOnly' => 'readOnly', 'required' => 'required']) !!}
        </div>
    </div>
</div>
@if(isset($dados->user_condominium_id))
<input type="hidden" name="user_condominium_id" value="{{ $dados->user_condominium_id }}" />
@endif

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('reason', 'Motívo:') !!}
            {!! Form::text('reason', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('reserve_area_id', 'Área Comum: *') !!}
            <select class="form-control" required="required" name="reserve_area_id">
                <option value="">Selecionar</option>
                @if(!$reserveAreas->isEmpty())
                    @foreach($reserveAreas as $reserveArea)
                        <option value="{{ $reserveArea->id }}"
                                @if(isset($dados->reserve_area_id) && $dados->reserve_area_id == $reserveArea->id) selected @endif>{{ $reserveArea->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('date', 'Data: *') !!}
            <div class="input-group">
                {!! Form::text('date', null, ['class'=>'form-control', 'id' => 'date', 'data-plugin' => 'datepicker', 'placeholder' => '99/99/9999', 'required' => 'required']) !!}
                <span class="input-group-addon">
                    <i class="icon md-calendar" aria-hidden="true"></i>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('start_time', 'Hora Início: *') !!}
            {!! Form::text('start_time', null, ['class'=>'form-control', 'data-plugin' => 'formatter', 'data-pattern' => '[[99]]:[[99]]', 'placeholder' => '99:99', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('end_time', 'Hora Fim: *') !!}
            {!! Form::text('end_time', null, ['class'=>'form-control', 'data-plugin' => 'formatter', 'data-pattern' => '[[99]]:[[99]]', 'placeholder' => '99:99:99', 'required' => 'required']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('description', 'Observação:') !!}
            {!! Form::textarea('description', null, ['class'=>'form-control', 'rows' => '4']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('notify', 'Notificar administrador? *') !!}
            {!! Form::select('notify', ['n' => 'Não', 'y' => 'Sim'], null, ['class'=>'form-control', 'placeholder' => 'Selecione', 'required' => 'required']) !!}
        </div>
    </div>
</div>