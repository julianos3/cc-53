@extends('portal.layouts.portal')

@section('content')

    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $config['title'] }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li><a href="{{ route('portal.manage.index') }}">Administração</a></li>
                <li class="active">{{ $config['title'] }}</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">
                    @include('success._check')
                    @include('errors._check')
                    @include('portal.modals.delete')
                    @include('portal.manage.contract.modal.modal_show')

                    @if(session()->get('admin') == 'y')
                    <a href="{{ route('portal.manage.contract.create') }}"
                       data-toggle="tooltip"
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
                                            data-tablesaw-priority="persist">Serviço
                                        </th>
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="1">Fornecedor</th>
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="2">Status</th>
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="3">Data Início</th>
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="4">Data Fim</th>
                                        <th class="text-center col-md-2">
                                            Ação
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dados  as $row)
                                        <tr>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->provider->name }}</td>
                                            <td>{{ $row->contractStatus->name }}</td>
                                            <td>{{ date('d/m/Y', strtotime($row->start_date)) }}</td>
                                            <td>{{ date('d/m/Y', strtotime($row->end_date)) }}</td>
                                            <td class="text-center">
                                                <button title="Visualizar"
                                                        class="btn btn-icon bg-success waves-effect waves-light btnShowModal"
                                                        data-target="#modalShowContract" data-toggle="modal"
                                                        data-route="{{ route('portal.manage.contract.show', ['id' => $row->id]) }}">
                                                    <i class="icon wb-zoom-in" aria-hidden="true"></i>
                                                </button>
                                            @if(session()->get('admin') == 'y')
                                                <a href="{{ route('portal.manage.contract.edit', ['id' => $row->id]) }}"
                                                   title="Editar"
                                                   data-toggle="tooltip"
                                                   data-original-title="Editar"
                                                   class="btn btn-icon bg-warning waves-effect waves-light">
                                                    <i class="icon wb-edit" aria-hidden="true"></i>
                                                </a>
                                                <button title="Excluir"
                                                        class="btn btn-icon bg-danger waves-effect waves-light btnDelete"
                                                        data-target="#modalDelete" data-toggle="modal"
                                                        data-route="{{ route('portal.manage.contract.destroy', ['id' => $row->id]) }}">
                                                    <i class="icon wb-trash" aria-hidden="true"></i>
                                                </button>
                                                @endif
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
                                    Nenhum contrato cadastro.
                                </h4>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if(session()->get('admin') == 'y')
    <a href="{{ route('portal.manage.contract.create') }}" title="Cadastrar"
       data-toggle="tooltip"
       data-original-title="Cadastrar"
       class="site-action site-floataction btn-raised btn btn-success btn-floating">
        <i class="icon md-plus" aria-hidden="true"></i>
    </a>
    @endif

@endsection