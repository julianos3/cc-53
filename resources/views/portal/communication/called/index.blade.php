@extends('portal.layouts.portal')
@section('content')
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $config['title'] }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li><a href="{{ route('portal.communication.index') }}">Comunicação</a></li>
                <li class="active">{{ $config['title'] }}</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">
                    @include('success._check')
                    @include('errors._check')
                    @include('portal.modals.delete')
                    @include('portal.communication.called.modal.modal_show')

                    <a href="{{ route('portal.communication.called.create') }}"
                       data-toggle="tooltip"
                       data-original-title="Novo Chamado"
                       class="btn btn-primary waves-effect waves-light">
                        <i class="icon wb-plus" aria-hidden="true"></i>
                        Novo Chamado
                    </a>

                    @if(!$dados->isEmpty())
                        <div class="row">
                            <div class="col-md-12">
                                <table class="tablesaw table-striped table-bordered table-hover"
                                       data-tablesaw-mode="swipe"
                                       data-tablesaw-sortable data-tablesaw-minimap>
                                    <thead>
                                    <tr>
                                        <th data-tablesaw-sortable-col data-tablesaw-sortable-default-col
                                            data-tablesaw-priority="persist">Código
                                        </th>
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="1">Assunto</th>
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="2">Status</th>
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="3">Tipo</th>
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="3">Criado Por</th>
                                        @if(session()->get('admin') == 'y')
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="4">Visivel</th>
                                        @endif
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="5">Data de Abertura</th>
                                        <th class="text-center col-md-2">
                                            Detalhes
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dados as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->subject }}</td>
                                            <td>{{ $row->calledStatus->name }}</td>
                                            <td>{{ $row->calledCategory->name }}</td>
                                            <td>{{ $row->userCondominium->user->name }}</td>
                                            @if(session()->get('admin') == 'y')
                                            <td>@if($row->visible == 'y') Sim @else Não @endif</td>
                                            @endif
                                            <td>{{ date('d/m/Y h:i', strtotime($row->created_at)) }}</td>
                                            <td class="text-center">
                                                <button title="Visualizar"
                                                        class="btn btn-icon bg-success waves-effect waves-light btnShowCalled"
                                                        data-target="#modalCalled" data-toggle="modal"
                                                        data-id="{{ $row->id }}">
                                                    <i class="icon wb-zoom-in" aria-hidden="true"></i>
                                                </button>
                                                @can('update', $row)
                                                <a href="{{ route('portal.communication.called.edit', ['id' => $row->id]) }}"
                                                   title="Editar"
                                                   class="btn btn-icon bg-warning waves-effect waves-light">
                                                    <i class="icon wb-edit" aria-hidden="true"></i>
                                                </a>
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
                            <div class="col-md-12">
                                <h3 class="page-title text-center padding-top-20">
                                    Nenhum chamado realizado.
                                </h3>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('portal.communication.called.create') }}" title="Novo Chamado"
       data-toggle="tooltip"
       data-original-title="Novo Chamado"
       class="site-action site-floataction btn-raised btn btn-success btn-floating">
        <i class="icon md-plus" aria-hidden="true"></i>
    </a>
@endsection