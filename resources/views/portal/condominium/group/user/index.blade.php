@extends('portal.layouts.portal')

@section('content')

    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $config['title'] }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li><a href="{{ route('portal.condominium.index') }}">Condomínio</a></li>
                <li><a href="{{ route('portal.condominium.group.index') }}">Grupos</a></li>
                <li class="active">Integrantes</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">

                    <div class="row">
                        @if(session()->get('admin') == 'y')
                        <div class="col-md-6 padding-bottom-10">
                            <a href="javascript:void(0);"
                               data-original-title="Cadastrar"
                               data-target="#modalGroupUser" data-toggle="modal"
                               class="btn btn-primary waves-effect waves-light">
                                <i class="icon wb-plus" aria-hidden="true"></i>
                                Cadastrar
                            </a>
                        </div>
                        @endif
                        <div class="@if(session()->get('admin') == 'y') col-md-6 @else col-md-12 @endif padding-bottom-10 text-right">
                            <a href="{{ route('portal.condominium.group.index') }}"
                               data-toggle="tooltip"
                               data-original-title="Voltar" title="Voltar"
                               class="btn btn-dark waves-effect waves-light">
                                <i class="icon md-arrow-left" aria-hidden="true"></i>
                                Voltar
                            </a>
                        </div>
                    </div>

                    @include('success._check')
                    @include('errors._check')
                    @include('portal.modals.delete')
                    @include('portal.condominium.group.user.modals.create')

                    @if(!$dados->isEmpty())
                        <div class="row">
                            <div class="col-md-12">
                                <table class="tablesaw table-striped table-bordered table-hover"
                                       data-tablesaw-mode="swipe"
                                       data-tablesaw-sortable data-tablesaw-minimap>
                                    <thead>
                                    <tr>
                                        <th data-tablesaw-sortable-col data-tablesaw-sortable-default-col
                                            data-tablesaw-priority="persist">Nome
                                        </th>
                                        @can('admin', $dados[0])
                                        <th class="text-center col-md-2">
                                            Ação
                                        </th>
                                        @endcan
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dados  as $row)
                                        <tr>
                                            <td>{{ $row->userCondominium->user->name }}</td>
                                            @can('admin', $dados[0])
                                            <td class="text-center">
                                                <button title="Excluir"
                                                        class="btn btn-icon bg-danger waves-effect waves-light btnDelete"
                                                        data-target="#modalDelete" data-toggle="modal"
                                                        data-route="{{ route('portal.condominium.group.user.destroy', ['groupId' => $groupId, 'id' => $row->id]) }}">
                                                    <i class="icon wb-trash" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            @endcan
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                {!! $dados->setPath('')->appends(Request::except('page'))->render() !!}
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h4 class="page-title">
                                    <br />
                                    Nenhum integrante adicionado a este grupo.
                                </h4>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if(session()->get('admin') == 'y')
    <a href="javascript:void(0);"
       data-target="#modalGroupUser" data-toggle="modal" title="Cadastrar" class="site-action site-floataction btn-raised btn btn-success btn-floating">
        <i class="icon md-plus" aria-hidden="true"></i>
    </a>
    @endif

@endsection