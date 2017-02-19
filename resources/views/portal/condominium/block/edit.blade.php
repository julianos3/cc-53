@extends('portal.layouts.portal')
@section('content')
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $config['title'] }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li><a href="{{ route('portal.condominium.index') }}">Condomínio</a></li>
                <li><a href="{{ route('portal.condominium.block.index') }}">Blocos</a></li>
                <li class="active">Alterar</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">
                    <?php
                    $urlBack = route('portal.condominium.block.index');
                    ?>
                    @include('portal.layouts.btn_black')
                    @include('success._check')
                    @include('errors._check')

                    {!! Form::model($dados, ['route'=>['portal.condominium.block.update', $dados->id]]) !!}

                    @include('portal.condominium.block._form')

                    <div class="form-group text-right">
                        <button type="submit" data-toggle="tooltip" data-original-title="Atualizar Bloco" class="btn btn-success waves-effect waves-light">
                            <i class="icon md-check" aria-hidden="true"></i>
                            Atualizar Bloco
                        </button>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection