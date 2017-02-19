@extends('portal.layouts.portal')
@section('content')
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $config['title'] }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li><a href="{{ route('portal.communication.index') }}">Comunicação</a></li>
                <li><a href="{{ route('portal.communication.called.index') }}">Chamados</a></li>
                <li class="active">Alterar</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">
                    <?php
                    $urlBack = route('portal.communication.called.index');
                    ?>
                    @include('portal.layouts.btn_black')
                    @include('success._check')
                    @include('errors._check')

                    {!! Form::model($dados, ['route'=>['portal.communication.called.update', $dados->id]]) !!}

                    @include('portal.communication.called.form._form_edit')

                    <div class="form-group text-right">
                        <button type="submit" data-toggle="tooltip" data-original-title="Atualizar Chamado" class="btn btn-success waves-effect waves-light">
                            <i class="icon md-check" aria-hidden="true"></i>
                            Atualizar Chamado
                        </button>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection