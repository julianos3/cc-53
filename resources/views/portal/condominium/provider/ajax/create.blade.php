{!! Form::open(['route'=>'portal.condominium.provider.storeAjax', 'id' => 'createAjaxProvider']) !!}

@include('portal.condominium.provider._form')

<div class="form-group text-right">
    {!! Form::button('Cadastrar', ['type' => 'submit', 'class'=>'btn btn-raised btn-primary waves-effect waves-light']) !!}
</div>

{!! Form::close() !!}