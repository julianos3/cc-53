@extends('portal.layouts.portal')

@section('content')
    <div class="page animsition">
    ID Condominium: {{ $condominium->id }}<br />
    Condominium Name: {{ $condominium->name }}<br />
    User Condominium ID: {{ $userCondominiumId }}
    </div>

@endsection