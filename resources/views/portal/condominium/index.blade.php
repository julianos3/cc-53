@extends('portal.layouts.portal')

@section('content')

    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $config['title'] }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li class="active">Meus Condomínios</li>
            </ol>
        </div>
        <div class="page-content">
            @if($dados->toArray())
                <div class="row">
                @foreach($dados as $row)
                <div class="col-md-3">
                    <div class="widget widget-shadow text-center">
                        <div class="widget-header">
                            <div class="widget-header-content">
                                <a class="avatar avatar-lg" href="javascript:void(0)">
                                    <img src="{{ asset('portal/assets/images/condominium-not-image.png') }}" alt="{{ $row->condominium->name }}">
                                </a>
                                <h5 class="profile-user">{{ $row->condominium->name }}</h5>
                                <p class="profile-job">{{ $row->condominium->finality->name }}</p>
                                <p>
                                    @if(isset($row->condominium->address))
                                        {{ $row->condominium->address }}
                                    @endif
                                    @if(isset($row->condominium->number))
                                        {{ ', nº '.$row->condominium->number }}
                                    @endif
                                    @if(isset($row->condominium->district))
                                        {{ ', Bairro '.$row->condominium->district }}
                                    @endif
                                    @if(isset($row->condominium->complement))
                                        {{ ', Complemento '.$row->condominium->complement }}
                                    @endif
                                    @if(isset($row->condominium->zip_code))
                                        {{ ', '.$row->condominium->zip_code }}
                                    @endif
                                </p>
                                @if($row->active == 'n')
                                    <p class="alert-danger">Aguardando aprovação do condomínio!</p>
                                @else
                                    @if (count($dados) > 1)
                                    <a href="{{ route('portal.condominium.accessGet', ['id' => $row->condominium->id]) }}"
                                       title="Acessar"
                                       class="btn btn-icon bg-success waves-effect waves-light">
                                        <i class="icon wb-zoom-in" aria-hidden="true"></i>
                                        Acessar
                                    </a>
                                    @endif
                                    @can('updateAdmin', $row)
                                    <a href="{{ route('portal.condominium.edit', ['id' => $row->condominium->id]) }}"
                                       title="Editar"
                                       class="btn btn-icon bg-warning waves-effect waves-light">
                                        <i class="icon wb-edit" aria-hidden="true"></i>
                                        Editar
                                    </a>
                                    @endcan
                                @endif
                            </div>
                        </div>
                        <!--
                        <div class="widget-footer">
                            <div class="row no-space">
                                <div class="col-xs-12">
                                    <strong class="profile-stat-count">260</strong>
                                    <span>Integrantes</span>
                                </div>
                            </div>
                        </div>
                        -->
                    </div>
                </div>
                @endforeach
                </div>
            @else
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="page-title text-center padding-top-20">
                            Nenhum cadastro realizado.
                        </h3>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <a href="{{ route('portal.condominium.create') }}" title="Criar Condomínio"
       data-toggle="tooltip"
       data-original-title="Criar Condomínio"
       class="site-action site-floataction btn-raised btn btn-success btn-floating">
        <i class="icon md-plus" aria-hidden="true"></i>
    </a>

@endsection