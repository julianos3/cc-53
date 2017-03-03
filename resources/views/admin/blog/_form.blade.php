<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name', 'Nome *') !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('active', 'Ativo? *') !!}
            {!! Form::select('active', ['y' => 'Sim', 'n' => 'Não'], null, ['class'=>'form-control', 'required' => 'required']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('date', 'Data *') !!}
            {!! Form::text('date', null, ['class'=>'form-control', 'data-input-mask' => '99/99/9999', 'data-plugin-datepicker', 'data-plugin-masked-input', 'placeholder' => '__/__/____', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('date_publish', 'Data e hora de Publicação *') !!}
            {!! Form::text('date_publish', null, ['class'=>'form-control', 'data-input-mask' => '99/99/9999 99:99', 'data-plugin-masked-input', 'placeholder' => '__/__/____ __:__', 'required' => 'required']) !!}
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

<script>
    CKEDITOR.replace( 'description' );
</script>