<option value="">Selecione</option>
@foreach($providers as $provider)
    <option value="{{ $provider->id }}" @if(isset($dados->provider_id) && $dados->provider_id == $provider->id) selected @endif>{{ $provider->name }}</option>
@endforeach