<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('title', 'Titulo *') !!}
            {!! Form::text('title', null, ['class'=>'form-control', 'required' => 'required']) !!}
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