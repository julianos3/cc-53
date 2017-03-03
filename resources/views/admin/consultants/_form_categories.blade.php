<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('categories_consultants_id', 'Categoria? *') !!}
            <select class="form-control" required="required" id="categories_consultants_id" name="categories_consultants_id">
                <option value="">Selecione</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {!! Form::hidden('consultants_id', $id, ['required' => 'required']) !!}
</div>
<br />