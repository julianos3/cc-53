@if(session()->get('admin') == 'y')
@foreach($messagePerfil as $message)
<div class="col-md-4">
    <div class="alert alert-warning alert-icon alert-dismissible" role="alert">
        <i class="icon wb-alert-circle" aria-hidden="true"></i>
        <h4>Atenção!</h4>
        <p>
            {{ $message['message'] }}
        </p>
        <p class="margin-top-10">
            <a href="{{ $message['route'] }}" class="btn btn-warning waves-effect waves-light" type="button">
                <i class="icon wb-check" aria-hidden="true"></i>
                Adicionar
            </a>
        </p>
    </div>
</div>
@endforeach
@endif