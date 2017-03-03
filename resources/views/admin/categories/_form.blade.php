<div class="row">
    <div class="col-md-12">
        <div class="tabs">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#categories" data-toggle="tab">
                        <i class="fa fa-file-text-o"></i>
                        Categoria
                    </a>
                </li>
                <li>
                    <a href="#seo" data-toggle="tab">
                        <i class="fa fa-search-plus"></i>
                        SEO (Buscadores)
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="categories" class="tab-pane active">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('name', 'Nome *') !!}
                                {!! Form::text('name', null, ['class'=>'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('color', 'Cor *') !!}
                                {!! Form::text('color', null, ['class'=>'form-control colorpicker-default colorpicker-element', 'data-plugin-colorpicker', 'required' => 'required']) !!}
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
                                <label class="control-label">Ícone <strong>( 1920px X 1080px, conteúdo principal centralizado )</strong></label>
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="input-append">
                                        <div class="uneditable-input">
                                            <i class="fa fa-file fileupload-exists"></i>
                                            <span class="fileupload-preview"></span>
                                        </div>
                                        <span class="btn btn-default btn-file">
                                    <span class="fileupload-exists">Trocar</span>
                                    <span class="fileupload-new">Selecionar Ícone</span>
                                    <input type="file" name="image" />
                                </span>
                                        <a href="#" class="btn btn-default   fileupload-exists" data-dismiss="fileupload">Remover</a>
                                        <?php if(isset($dados->image) && $dados->image != ''){ ?>
                                        <a href="{{ asset('uploads/categories/'.$dados->image) }}" class="lightBox btn btn-default active">Visualizar Ícone</a>
                                        <a href="{{ route('admin.categories.destroyImage', ['id' => $dados->id]) }}" class="btn btn-default">Deletar</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="seo" class="tab-pane">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('seo_keywords', 'Palavras Chaves * (Ex: categoria 01, categoria, 01 categoria, 01)') !!}
                                {!! Form::text('seo_keywords', null, ['class'=>'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('seo_description', 'Descrição Página *') !!}
                                {!! Form::text('seo_description', null, ['class'=>'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>