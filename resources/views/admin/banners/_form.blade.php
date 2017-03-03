<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name', 'Nome *') !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('sub_name', 'Sub Nome') !!}
            {!! Form::text('sub_name', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('target_blank', 'Abrir em nova aba? *') !!}
            {!! Form::select('target_blank', ['y' => 'Sim', 'n' => 'Não'], null, ['class'=>'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('link_url', 'Link') !!}
            {!! Form::text('link_url', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('active', 'Ativo? *') !!}
            {!! Form::select('active', ['y' => 'Sim', 'n' => 'Não'], null, ['class'=>'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('order', 'Ordem *') !!}
            {!! Form::text('order', null, ['class'=>'form-control', 'required' => 'required']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">Imagem <strong>( 1920px X 1080px, conteúdo principal centralizado )</strong></label>
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
                    <a href="{{ asset('uploads/banner/'.$dados->image) }}" class="lightBox btn btn-default active">Visualizar Imagem</a>
                    <a href="{{ route('admin.banners.destroyImage', ['id' => $dados->id]) }}" class="btn btn-default">Deletar</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>