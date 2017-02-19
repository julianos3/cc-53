@extends('portal.layouts.portal')

@section('content')
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $config['title'] }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li><a href="{{ route('portal.communication.index') }}">Comunicação</a></li>
                <li><a href="{{ route('portal.communication.communication.index') }}">Comunicados</a></li>
                <li class="active">Visualizar</li>
            </ol>
        </div>
        <div class="page-content container-fluid">
            <div class="panel">
                <div class="panel-body">
                    <?php
                    $urlBack = route('portal.communication.communication.index');
                    ?>
                    @include('portal.layouts.btn_black')
                    <div class="row">
                        <div class="col-md-4">
                            <label for="id"><strong>Código</strong></label>
                            <p class="form-control-static">Nº: {{ $dados->id }}</p>
                        </div>
                        <div class="col-md-4">
                            <label for="criado"><strong>Criado Por</strong></label>
                            <p class="form-control-static">{{ $dados->userCondominium->user->name.' | '.$dados->userCondominium->userRoleCondominium->name }}</p>
                        </div>
                        <div class="col-md-4">
                            <label for="created_at"><strong>Data Criado</strong></label>
                            <p class="form-control-static">{{ date('d/m/Y', strtotime($dados->created_at)) }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name"><strong>Título</strong></label>
                            <p class="form-control-static">{{ $dados->name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="description"><strong>Descrição</strong></label>
                            <p class="form-control-static">{!! nl2br($dados->description) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection