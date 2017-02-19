@extends('portal.layouts.portal')
@section('content')
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $config['title'] }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li><a href="{{ route('portal.condominium.index') }}">Condomínio</a></li>
                <li class="active">Cadastrar</li>
            </ol>
        </div>
        <div class="page-content container-fluid">
            <div class="panel">
                <div class="panel-body">
                    <?php
                    $urlBack = route('portal.condominium.index');
                    ?>
                    @include('portal.layouts.btn_black')
                    {!! Form::model($dados, ['route'=>['portal.condominium.update.info', $dados->id], 'files' => true]) !!}
                        @include('success._check')
                        @include('errors._check')

                        @include('portal.condominium.edit._form')

                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-success"
                                        data-toggle="tooltip"
                                        data-original-title="Avançar">
                                    <i class="icon wb-check" aria-hidden="true"></i>
                                    Salvar
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection