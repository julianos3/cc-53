{!! Form::open(['route'=>'portal.communication.message.public.store']) !!}

@include('portal.communication.message.public._form')

<div class="form-group text-right">
    {!! Form::button('Enviar Mensagem', ['type' => 'submit', 'class'=>'btn btn-raised btn-primary waves-effect waves-light']) !!}
</div>

{!! Form::close() !!}