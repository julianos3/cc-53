@extends('portal.layouts.portal')

@section('content')
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $config['title'] }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li><a href="{{ route('portal.communication.index') }}">Comunicação</a></li>
                <li><a href="{{ route('portal.communication.communication-condominium.index') }}">Comunicados</a></li>
                <li class="active">Visualizar</li>
            </ol>
        </div>
        <div class="page-content container-fluid">
            <div class="panel">
                <div class="panel-body">
                    <?php
                    $urlBack = route('portal.communication.communication-condominium.index');
                    ?>
                    @include('portal.layouts.btn_black')
                    <div class="row">
                        <div class="col-md-4">
                            <label for="codigo"><strong>Código</strong></label>
                            <p class="form-control-static">Nº: {{ $dados->id }}</p>
                        </div>
                        <div class="col-md-4">
                            <label for="codigo"><strong>Criado Por</strong></label>
                            <p class="form-control-static">{{ $dados->userCondominium->user->name.' | '.$dados->userCondominium->userRoleCondominium->name }}</p>
                        </div>
                        <div class="col-md-4">
                            <label for="codigo"><strong>Data Criado</strong></label>
                            <p class="form-control-static">{{ date('d/m/Y', strtotime($dados->created_at)) }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="codigo"><strong>Visivel até</strong></label>
                            <p class="form-control-static">{{ date('d/m/Y', strtotime($dados->date_display)) }}</p>
                        </div>
                        <div class="col-md-4">
                            <label for="codigo"><strong>Enviado por e-mail?</strong></label>
                            <p class="form-control-static">@if($dados->send_mail == 'y') Sim @else Não @endif</p>
                        </div>
                        <div class="col-md-4">
                            <label for="codigo"><strong>Todos os usuários?</strong></label>
                            <p class="form-control-static">@if($dados->all_user == 'y') Sim @else Somente Grupos @endif</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="codigo"><strong>Título</strong></label>
                            <p class="form-control-static">{{ $dados->name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="codigo"><strong>Descrição</strong></label>
                            <p class="form-control-static">{!! nl2br($dados->description) !!}</p>
                        </div>
                    </div>
                    @if($dados->all_user == 'n')
                    <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="tablesaw table-striped table-bordered table-hover"
                                       data-tablesaw-mode="swipe"
                                       data-tablesaw-sortable data-tablesaw-minimap>
                                    <thead>
                                        <tr>
                                            <th data-tablesaw-sortable-col data-tablesaw-sortable-default-col
                                                data-tablesaw-priority="persist">Grupos
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dados->communicationGroup as $row)
                                        <tr>
                                            <td>{{ $row->groupCondominium->name }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                    @if(!$dados->userCommunication->isEmpty())
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="tablesaw table-striped table-bordered table-hover"
                                   data-tablesaw-mode="swipe"
                                   data-tablesaw-sortable data-tablesaw-minimap>
                                <thead>
                                <tr>
                                    <th data-tablesaw-sortable-col data-tablesaw-sortable-default-col
                                        data-tablesaw-priority="persist">Integrantes
                                    </th>
                                    <th data-tablesaw-sortable-col data-tablesaw-priority="1">E-mail</th>
                                    <th class="text-center" data-tablesaw-priority="2">Visualizado</th>
                                    <th class="text-center" data-tablesaw-priority="3">Data Visualizado</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dados->userCommunication as $row)
                                    <tr>
                                        <td>{{ $row->userCondominium->user->name }}</td>
                                        <td>{{ $row->userCondominium->user->email }}</td>
                                        <td class="text-center">
                                            @if($row->view == 'y')
                                                <i class="icon wb-check text-success" aria-hidden="true"></i>
                                            @else
                                                <i class="icon wb-close text-danger" aria-hidden="true"></i>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ date('d/m/Y H:i', strtotime($row->created_at)) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection