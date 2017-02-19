{!! Form::open(['route'=>'portal.communication.message.public.store']) !!}

@include('portal.communication.message.public._form')

<div class="form-group text-right">
    <button type="submit" data-toggle="tooltip" data-original-title="Enviar Mensagem" class="btn btn-success waves-effect waves-light">
        <i class="icon md-check" aria-hidden="true"></i>
        Enviar Mensagem
    </button>
</div>

{!! Form::close() !!}