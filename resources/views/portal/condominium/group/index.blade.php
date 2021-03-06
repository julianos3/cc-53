@extends('portal.layouts.portal')

@section('content')

    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $config['title'] }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li><a href="{{ route('portal.condominium.index') }}">Condomínio</a></li>
                <li class="active">Grupos</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">
                    @include('success._check')
                    @include('errors._check')
                    @include('portal.modals.delete')
                    @include('portal.condominium.group.modals.create')
                    @include('portal.condominium.group.modals.edit')

                    @if(session()->get('admin') == 'y')
                    <a href="javascript:void(0);"
                       data-target="#modalGroupCreate" data-toggle="modal"
                       data-original-title="Cadastrar"
                       class="btn btn-primary waves-effect waves-light">
                        <i class="icon wb-plus" aria-hidden="true"></i>
                        Cadastrar
                    </a>
                    @endif

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
                                        @if(session()->get('admin') == 'y')
                                        <th class="text-center col-md-1">
                                            Ativo
                                        </th>
                                        @endif
                                        <th class="text-center col-md-2">
                                            Ação
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dados  as $row)
                                        <tr>
                                            <td>{{ $row->name }}</td>
                                            @if(session()->get('admin') == 'y')
                                            <td class="text-center">@if($row->active == 'y') Sim @else Não @endif</td>
                                            @endif
                                            <td class="text-center">
                                                <a href="{{ route('portal.condominium.group.user.index', ['id' => $row->id]) }}"
                                                   title="Integrantes"
                                                   class="btn btn-icon bg-success waves-effect waves-light">
                                                    <i class="icon wb-users" aria-hidden="true"></i>
                                                </a>
                                                @can('admin', $row)
                                                <a href="javascript:void(0);"
                                                   title="Editar"
                                                   data-target="#modalGroupEdit" data-toggle="modal"
                                                   data-id="{{ $row->id }}"
                                                   class="btn btn-icon bg-warning waves-effect waves-light btnEditGroup">
                                                    <i class="icon wb-edit" aria-hidden="true"></i>
                                                </a>
                                                <button title="Excluir"
                                                        class="btn btn-icon bg-danger waves-effect waves-light btnDelete"
                                                        data-target="#modalDelete" data-toggle="modal"
                                                        data-route="{{ route('portal.condominium.group.destroy', ['id' => $row->id]) }}">
                                                    <i class="icon wb-trash" aria-hidden="true"></i>
                                                </button>
                                                @endcan
                                            </td>
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
                                    Nenhum grupo cadastrado.
                                </h4>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if(session()->get('admin') == 'y')
    <a href="javascript:void(0);" title="Cadastrar"
        data-target="#modalGroupCreate" data-toggle="modal"
        data-original-title="Cadastrar"
        class="site-action site-floataction btn-raised btn btn-success btn-floating">
        <i class="icon md-plus" aria-hidden="true"></i>
    </a>
    @endif

@endsection