@extends('portal.layouts.portal')

@section('content')
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $config['title'] }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li><a href="{{ route('portal.condominium.index') }}">Condomínio</a></li>
                <li><a href="{{ route('portal.condominium.user.index') }}">Integrantes</a></li>
                <li class="active">Configurações</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">
                    <?php
                    $urlBack = route('portal.condominium.user.index');
                    ?>
                    @include('portal.layouts.btn_black')
                    @include('success._check')
                    @include('errors._check')
                    @include('portal.modals.warning')

                    {!! Form::model($dados, ['route'=> ['portal.condominium.user.config.update', $dados->id], 'files' => true]) !!}
                    <div class="example-wrap margin-lg-0">
                        <div class="nav-tabs-horizontal">

                            <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
                                <li>
                                    <a href="{{ route('portal.condominium.user.edit', ['id'=> $dados->id]) }}">
                                        Dados Pessoais
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('portal.condominium.user.unit', ['id'=> $dados->id]) }}" aria-controls="tabUnit" role="tab">
                                        Unidades
                                    </a>
                                </li>
                                <li class="active" role="presentation">
                                    <a href="{{ route('portal.condominium.user.config', ['id'=> $dados->id]) }}" aria-controls="tabConfig" role="tab">
                                        Configurações
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content padding-top-20">
                                <div class="tab-pane active" id="tabConfig" role="tabpanel">
                                    @include('portal.condominium.user.config._form')
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" data-toggle="tooltip" data-original-title="Atualizar Configurações" class="btn btn-success waves-effect waves-light">
                            <i class="icon md-check" aria-hidden="true"></i>
                            Atualizar Configurações
                        </button>
                    </div>

                    {!! Form::close() !!}

                    <hr />

                    <div class="row">
                        <div class="col-md-12">
                            <a href="javascript:void(0);"
                               data-target="#modalWarning" data-toggle="modal"
                               data-route="{{ route('portal.condominium.user.newPassword', ['id' => $dados->id, 'user_id' => $dados->user_id]) }}"
                               data-msg="Será gerado e enviado uma nova senha para o e-mail {{ $dados->user->email }}"
                               title="Enviar nova senha por e-mail" class="col-md-12 btn btn-lg btn-warning btnShowWarning">
                                <i class="icon md-mail-send"></i>
                                Enviar nova senha por e-mail
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection