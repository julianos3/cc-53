@extends('portal.layouts.portal')

@section('content')

    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $config['title'] }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li><a href="{{ route('portal.manage.index') }}">Administração</a></li>
                <li><a href="{{ route('portal.manage.reserve-areas.index') }}">Recurso Comum</a></li>
                <li class="active">Alterar</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">
                    <?php
                    $urlBack = route('portal.manage.reserve-areas.index');
                    ?>
                    @include('portal.layouts.btn_black')
                    @include('success._check')
                    @include('errors._check')

                    {!! Form::model($dados, ['route'=>['portal.manage.reserve-areas.update', $dados->id]]) !!}

                    @include('portal.manage.reserve-areas._form')

                    <div class="form-group text-right">
                        <button type="submit" data-toggle="tooltip" data-original-title="Atualizar Recurso" class="btn btn-success waves-effect waves-light">
                            <i class="icon md-check" aria-hidden="true"></i>
                            Atualizar Recurso
                        </button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection