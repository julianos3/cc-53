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
            <div class="page-header-actions">
                <a href="{{ route('portal.communication.communication.index') }}"
                   class="btn btn-sm btn-icon btn-dark waves-effect waves-light waves-round" data-toggle="tooltip"
                   data-original-title="Voltar">
                    <i class="icon wb-arrow-left" aria-hidden="true"></i>
                    Voltar
                </a>
            </div>
        </div>
        <div class="page-content container-fluid">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="codigo"><strong>Código</strong></label>
                            <p class="form-control-static">Nº: {{ $dados->id }}</p>
                        </div>
                        <div class="col-md-4">
                            <label for="codigo"><strong>Criado Por</strong></label>
                            <p class="form-control-static">{{ $dados->userCondominium->user->name.' | '.$dados->userCondominium->userRoleCondominium->name }}</p>
                        </div>
                        <div class="col-md-4">
                            <label for="codigo"><strong>Data Criado</strong></label>
                            <p class="form-control-static">{{ date('d/m/Y', strtotime($dados->created_at)) }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="codigo"><strong>Título</strong></label>
                            <p class="form-control-static">{{ $dados->name}}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="codigo"><strong>Descrição</strong></label>
                            <p class="form-control-static">{{ $dados->description }}</p>
                        </div>
                    </div>s
                </div>
            </div>
        </div>
    </div>
@endsection