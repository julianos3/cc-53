<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('Name', 'Nome *') !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'required' => 'required']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('phone', 'Telefone *') !!}
            {!! Form::text('phone', null, ['class'=>'form-control', 'data-plugin' => 'formatter', 'data-pattern' => '([[99]]) [[9999]]-[[99999]]', 'placeholder' => '(99) 9999-99999', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('email', 'E-mail *') !!}
            {!! Form::email('email', null, ['class'=>'form-control', 'required' => 'required']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="provider_category_id">Categoria:</label>
            <select class="form-control" required="required" id="provider_category_id" name="provider_category_id">
                <option value="">Selecione</option>
                @foreach($providerCategory as $category)
                    <option value="{{ $category->id }}" @if(isset($dados['provider_category_id']) && $dados['provider_category_id'] == $category->id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('Ativo', 'Ativo:') !!}
            {!! Form::select('active', ['y' => 'Sim','n' => 'Não'], null, ['class'=>'form-control', 'required' => 'required']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('descrição', 'Descrição:') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control', 'rows' => 4]) !!}
</div>