@extends('portal.layouts.portal')
@section('content')

    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $config['title'] }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li><a href="{{ route('portal.manage.index') }}">Administração</a></li>
                <li><a href="{{ route('portal.manage.contract.index') }}">Contratos</a></li>
                <li class="active">Cadastrar</li>
            </ol>
            <div class="page-header-actions">
                <a href="{{ route('portal.manage.contract.index') }}"
                   class="btn btn-sm btn-icon btn-dark waves-effect waves-light waves-round" data-toggle="tooltip"
                   data-original-title="Voltar">
                    <i class="icon wb-arrow-left" aria-hidden="true"></i>
                    Voltar
                </a>
            </div>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">
                    @include('success._check')
                    @include('errors._check')
                    @include('portal.modals.create')

                    {!! Form::open(['route'=>'portal.manage.contract.store', 'files' => true]) !!}

                    @include('portal.manage.contract._form')

                    <div class="form-group text-right">
                        <button type="submit"
                           data-toggle="tooltip"
                           data-original-title="Adicionar contrato"
                           class="btn btn-raised btn-primary waves-effect waves-light">
                            <i class="icon wb-plus" aria-hidden="true"></i>
                            Adicionar contrato
                        </button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection