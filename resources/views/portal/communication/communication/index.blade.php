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

                    @include('portal.communication.communication.modal.modal_show')

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
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="1">Título</th>
                                        <th class="text-center">Lido</th>
                                        <th class="text-center">Data Comunicado</th>
                                        <th data-tablesaw-sortable-col data-tablesaw-priority="2">Criado Por</th>
                                        <th class="text-center">
                                            Detalhes
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dados  as $row)
                                        <tr>
                                            <td>{{ $row->communication_id }}</td>
                                            <td>{{ $row->communication->name }}</td>
                                            <td class="text-center">
                                                @if($row->view == 'y')
                                                    <i class="icon wb-check text-success" aria-hidden="true"></i>
                                                @else
                                                    <i class="icon wb-close text-danger" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ date('d/m/Y', strtotime($row->created_at)) }}</td>
                                            <td>{{ $row->communication->userCondominium->user->name }}</td>
                                            <td class="text-center">
                                                <button title="Visualizar"
                                                        class="btn btn-icon bg-success waves-effect waves-light btnShowModal"
                                                        data-target="#modalShowCommunication" data-toggle="modal"
                                                        data-route="{{ route('portal.communication.communication.show', ['id' => $row->communication_id]) }}">
                                                    <i class="icon wb-zoom-in" aria-hidden="true"></i>
                                                </button>
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
                                    Nenhum comunicado recebido.
                                </h3>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection