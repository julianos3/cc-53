<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name', 'Nome *') !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'required' => 'required']) !!}
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
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('phone', 'Telefone *') !!}
            {!! Form::text('phone', null, ['class'=>'form-control', 'data-input-mask' => '(99) 9999-9999', 'data-plugin-masked-input', 'placeholder' => '(99) 9999-9999', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('cell_phone', 'Celular') !!}
            {!! Form::text('cell_phone', null, ['class'=>'form-control', 'data-input-mask' => '(99) 99999-9999', 'data-plugin-masked-input', 'placeholder' => '(99) 99999-9999']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('active', 'Ativo? *') !!}
            {!! Form::select('active', ['y' => 'Sim', 'n' => 'Não'], null, ['class'=>'form-control', 'required' => 'required']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">Imagem <strong>( 410px de largura, conteúdo principal centralizado )</strong></label>
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-append">
                    <div class="uneditable-input">
                        <i class="fa fa-file fileupload-exists"></i>
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-default btn-file">
                        <span class="fileupload-exists">Trocar</span>
                        <span class="fileupload-new">Selecionar Imagem</span>
                        <input type="file" name="image" />
                    </span>
                    <a href="#" class="btn btn-default   fileupload-exists" data-dismiss="fileupload">Remover</a>
                    <?php if(isset($dados->image) && $dados->image != ''){ ?>
                    <a href="{{ asset('uploads/consultants/'.$dados->image) }}" class="lightBox btn btn-default active">Visualizar Imagem</a>
                    <a href="{{ route('admin.consultants.destroyImage', ['id' => $dados->id]) }}" class="btn btn-default">Deletar</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>