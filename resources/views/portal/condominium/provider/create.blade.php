@extends('portal.layouts.portal')

@section('content')
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $config['title'] }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li><a href="{{ route('portal.condominium.index') }}">Condomínio</a></li>
                <li><a href="{{ route('portal.condominium.provider.index') }}">Fornecedores</a></li>
                <li class="active">Cadastrar</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">
                    <?php
                    $urlBack = route('portal.condominium.provider.index');
                    ?>
                    @include('portal.layouts.btn_black')
                    @include('success._check')
                    @include('errors._check')

                    <?php $block_id = 0; ?>

                    {!! Form::open(['route'=>'portal.condominium.provider.store']) !!}

                    @include('portal.condominium.provider._form')

                    <div class="form-group text-right">
                        <button type="submit" data-toggle="tooltip" data-original-title="Cadastrar Fornecedor" class="btn btn-success waves-effect waves-light">
                            <i class="icon md-check" aria-hidden="true"></i>
                            Cadastrar Fornecedor
                        </button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection