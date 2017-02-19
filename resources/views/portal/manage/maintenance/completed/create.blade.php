@extends('portal.layouts.portal')

@section('content')

    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $config['title'] }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li><a href="{{ route('portal.manage.index') }}">Administração</a></li>
                <li><a href="{{ route('portal.manage.maintenance.index') }}">Manutenções Preventivas</a></li>
                <li><a href="javascript:void(0);">Registros</a></li>
                <li class="active">Registrar Manutenção</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">
                    <?php
                    $urlBack = route('portal.manage.maintenance.index');
                    ?>
                    @include('portal.layouts.btn_black')
                    @include('success._check')
                    @include('errors._check')
                    @include('portal.modals.create')

                    {!! Form::open(['route'=>'portal.manage.maintenance.completed.store']) !!}

                    @include('portal.manage.maintenance.completed._form')

                    {!! Form::hidden('maintenance_id', $id, ['class'=>'form-control', 'required' => 'required']) !!}

                    <div class="form-group text-right">
                        <button type="submit" data-toggle="tooltip" data-original-title="Cadastrar Registro" class="btn btn-success waves-effect waves-light">
                            <i class="icon md-check" aria-hidden="true"></i>
                            Cadastrar Registro
                        </button>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection