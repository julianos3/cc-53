<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('tags_id', 'Tag? *') !!}
            <select class="form-control" required="required" id="tags_id" name="tags_id">
                <option value="">Selecione</option>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {!! Form::hidden('blog_id', $id, ['required' => 'required']) !!}
</div>
<br />