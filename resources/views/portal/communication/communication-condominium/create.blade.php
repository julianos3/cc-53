@extends('portal.layouts.portal')
@section('content')
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $config['title'] }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li><a href="{{ route('portal.communication.index') }}">Comunicação</a></li>
                <li><a href="{{ route('portal.communication.communication-condominium.index') }}">Comunicados</a></li>
                <li class="active">Cadastrar</li>
            </ol>
        </div>
        <div class="page-content container-fluid">
            <div class="panel">
                <div class="panel-body">
                    <?php
                    $urlBack = route('portal.communication.communication-condominium.index');
                    ?>
                    @include('portal.layouts.btn_black')
                    @include('success._check')
                    @include('errors._check')
                    <?php $paginaAlterar = false; ?>

                    {!! Form::open(['route'=>'portal.communication.communication-condominium.store']) !!}

                    @include('portal.communication.communication-condominium._form')

                    <div class="form-group text-right">
                        <button type="submit" data-toggle="tooltip" data-original-title="Cadastrar Comunicado" class="btn btn-success waves-effect waves-light">
                            <i class="icon md-check" aria-hidden="true"></i>
                            Cadastrar Comunicado
                        </button>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection