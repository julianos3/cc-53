<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name', 'Nome *') !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('video', 'Vídeo *') !!}
            {!! Form::text('video', null, ['class'=>'form-control', 'required' => 'required']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('category_id', 'Página Categoria *') !!}
            <select class="form-control" required="required" id="category_id" name="category_id">
                <option value="">Selecione</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(isset($dados->category_id) && $dados->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('active', 'Ativo? *') !!}
            {!! Form::select('active', ['y' => 'Sim', 'n' => 'Não'], null, ['class'=>'form-control', 'required' => 'required']) !!}
        </div>
    </div>
</div>
<br />