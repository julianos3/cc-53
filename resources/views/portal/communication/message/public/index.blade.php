@extends('portal.layouts.portal')

@section('content')
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $config['title'] }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li><a href="{{ route('portal.communication.index') }}">Comunicação</a></li>
                <li class="active">Mensagens Públicas</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">
                    @include('success._check')
                    @include('errors._check')
                    @include('portal.modals.delete')
                    @include('portal.communication.message.public.modal.modal_create')
                    @include('portal.communication.message.public.modal._comment')

                    <button title="Enviar Mensagem"
                            class="btn btn-primary waves-effect waves-light btnShowModal"
                            data-target="#modalCreateMessage" data-toggle="modal"
                            data-route="{{ route('portal.communication.message.public.create') }}">
                        <i class="icon wb-plus" aria-hidden="true"></i>
                        Enviar Mensagem
                    </button>

                    @if(!$dados->isEmpty())
                        <ul class="list-group">
                            @foreach($dados  as $row)
                                <li class="list-group-item">
                                    <div class="media media-lg well padding-10">
                                        <div class="media-left">
                                            <a class="avatar" href="javascript:void(0)">
                                                <?php
                                                if($row->userCondominium->user->imagem){
                                                    $imgAvatar = route('portal.condominium.user.image', ['id' => $row->userCondominium->user->id, 'image' => $row->userCondominium->user->imagem]);
                                                }else{
                                                    $imgAvatar = asset('portal/global/portraits/1.jpg');
                                                }
                                                ?>
                                                <div class="avatar" style="height: 50px; background: url('{{ $imgAvatar }}') top center; background-size: cover;"></div>
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                {{ $row->subject }}
                                                <span>{{ $row->userCondominium->user->name }}</span>
                                            </h4>
                                            <small>{{ date('d/m/Y H:i:s', strtotime($row->created_at)) }}</small>
                                            <div class="media-body">
                                                <p>{!! nl2br($row->message) !!}</p>
                                                <button title="Comentar"
                                                        class="btn btn-icon bg-warning waves-effect waves-light btnComentarMsgPublic"
                                                        data-target="#modalComment" data-toggle="modal"
                                                        data-id="{{ $row->id }}">
                                                    Responder
                                                </button>
                                                @can('delete', $row)
                                                <button title="Excluir"
                                                        class="btn btn-icon bg-danger waves-effect waves-light btnDelete"
                                                        data-target="#modalDelete" data-toggle="modal"
                                                        data-route="{{ route('portal.communication.message.public.destroy', ['id' => $row->id]) }}">
                                                    <i class="icon wb-trash" aria-hidden="true"></i>
                                                </button>
                                                @endcan
                                            </div>

                                        </div>
                                    </div>
                                    @if($row->messageReply->toArray())
                                        @foreach($row->messageReply as $reply)
                                            <div class="profile-brief margin-top-10">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <?php
                                                        if($reply->userCondominium->user->imagem){
                                                            $imgAvatar = route('portal.condominium.user.image', ['id' => $reply->userCondominium->user->id, 'image' => $reply->userCondominium->user->imagem]);
                                                        }else{
                                                            $imgAvatar = asset('portal/global/portraits/1.jpg');
                                                        }
                                                        ?>
                                                        <a class="avatar" href="javascript:void(0)" style="height: 50px; background: url('{{ $imgAvatar }}') top center; background-size: cover;"></a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">{{ $reply->userCondominium->user->name }}</h4>
                                                        <small>{{ date('d/m/Y H:i:s', strtotime($reply->created_at)) }}</small>
                                                        <p>
                                                            {!! nl2br($reply->message) !!}
                                                            @can('delete', $reply)
                                                                <a class="btnDelete"
                                                                   data-target="#modalDelete" data-toggle="modal"
                                                                   data-id="{{ $reply->id }}"
                                                                   data-route="{{ route('portal.communication.message.public.reply.destroy', ['id' => $reply->id]) }}"
                                                                   href="javascript:void(0);"
                                                                   title="Excluir">Excluir</a>
                                                            @endcan
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </li>
                        @endforeach
                        </ul>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                {!! $dados->setPath('')->appends(Request::except('page'))->render() !!}
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h4 class="page-title">
                                    <br/>
                                    Nenhum mensagem pública até o momento.
                                </h4>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <button title="Enviar Mensagem"
            class="site-action site-floataction btn-raised btn btn-success btn-floating btnShowModal"
            data-target="#modalCreateMessage" data-toggle="modal"
            data-route="{{ route('portal.communication.message.public.create') }}">
            <i class="icon md-plus" aria-hidden="true"></i>
    </button>

@endsection