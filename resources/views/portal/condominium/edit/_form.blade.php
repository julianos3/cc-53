<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('name', 'Nome do Condomínio *') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="row">
    @if($dados['image'])
        <div class="col-md-6 height-100">
            <a href="{{ route('portal.condominium.image', ['id' => $dados->id, 'image' => $dados['image']]) }}" class="zoom-light-box" data-effect="mfp-zoom-in">
                <img class="img-responsive margin-right-15 height-100 img-thumbnail" src="{{ route('portal.condominium.image', ['id' => $dados->id, 'image' => $dados['image']]) }}" />
            </a>
        </div>
    @endif
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('image', 'Imagem de Perfil') !!}
            <div class="input-group input-group-file">
                <input type="text" class="form-control" readonly="">
                <span class="input-group-btn">
                      <span class="btn btn-success btn-file waves-effect waves-light">
                        <i class="icon md-upload" aria-hidden="true"></i>
                        <input type="file" name="image" >
                      </span>
                </span>
                <p class="errors">{!!$errors->first('image')!!}</p>
                @if(Session::has('error'))
                    <p class="errors">{!! Session::get('error') !!}</p>
                @endif
            </div>
        </div>
    </div>
</div>
<hr />

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label"
                   for="finality_id">Finalidade</label>
            <select class="form-control" name="finality_id"
                    id="finality_id" required="required">
                <option value="">Selecione</option>
                @foreach($finality  as $row)
                    <option value="{{ $row->id }}"
                            @if($row['id'] === $dados['finality_id']) selected @endif>{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('cnpj', 'CNPJ *') !!}
            {!! Form::text('cnpj', null, ['class'=>'form-control', 'data-plugin' => 'formatter', 'data-pattern' => '[[99]].[[999]].[[999]]/[[9999]]-[[99]]', 'placeholder' => '99.999.999/9999-99' ]) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('zip_code', 'CEP *') !!}
            <div class="input-group">
            {!! Form::text('zip_code', null, ['class'=>'form-control', 'id' => 'cep', 'required' => 'required', 'placeholder' => 'CEP', 'data-plugin' => 'formatter', 'data-pattern' => '[[99999]]-[[999]]']) !!}
                <span class="input-group-btn">
                    <button type="button" formtarget="_blank"
                            onclick="window.open('http://www.buscacep.correios.com.br/sistemas/buscacep/')"
                            data-toggle="tooltip"
                            data-original-title="Não sei meu CEP"
                            class="btn btn-warning waves-effect waves-light"
                            id="">
                        <i class="icon wb-search" aria-hidden="true"></i>
                        Buscar
                    </button>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('address', 'Logradouro *') !!}
            {!! Form::text('address', null, ['class'=>'form-control', 'required' => 'required', 'placeholder' => 'Rua, Av..']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('number', 'Número *') !!}
            {!! Form::text('number', null, ['class'=>'form-control', 'required' => 'required', 'placeholder' => '99']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('district', 'Bairro *') !!}
            {!! Form::text('district', null, ['class'=>'form-control', 'required' => 'required']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('complemento', 'Complemento') !!}
            {!! Form::text('complement', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="uf">Estado</label>
            <select class="form-control" name="state_id" id="uf" required="required">
                <option value="">Selecione</option>
                @foreach($state as $row)
                    <option value="{{ $row->id }}" @if($dados->city->state_id == $row->id) selected @endif>{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="city">Cidade</label>
            <select class="form-control" name="city_id" id="city" required="required">
                <option value="">Selecione</option>
                @foreach($city as $row)
                    <option value="{{ $row->id }}" @if($dados->city_id == $row->id) selected @endif>{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

{!! Form::hidden('route', 'edit', ['class'=>'form-control']) !!}
{!! Form::hidden('condominium_id', $dados->id) !!}