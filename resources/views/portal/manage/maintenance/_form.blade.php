<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('name', 'Nome *') !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'required' => 'required']) !!}
        </div>
    </div>
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
            <label for="periodicity_id">Periodicidade *</label>
            <select class="form-control" required="required" id="periodicity_id" name="periodicity_id">
                <option value="">Selecione</option>
                @foreach($periodicitys as $periodicity)
                    <option value="{{ $periodicity->id }}" @if(isset($dados['periodicity_id']) && $dados['periodicity_id'] == $periodicity->id) selected @endif>{{ $periodicity->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('description', 'Observação') !!}
            {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>