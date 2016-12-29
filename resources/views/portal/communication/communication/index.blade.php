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
                                            <td>{{ $row->communication->userCondominium->user->name }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('portal.communication.communication.show', ['id' => $row->communication_id]) }}"
                                                   title="Visualizar"
                                                   class="btn btn-icon bg-success waves-effect waves-light">
                                                    <i class="icon wb-zoom-in" aria-hidden="true"></i>
                                                </a>
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