@extends('portal.layouts.portal')

@section('content')

    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $config['title'] }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li><a href="{{ route('portal.condominium.index') }}">Condomínio</a></li>
                <li class="active">Integrantes</li>
            </ol>
        </div>
        <div class="page-content">

            @include('success._check')
            @include('errors._check')
            @include('portal.modals.delete')

            @if($dados->toArray())
                <div class="row">
                    @foreach($dados as $row)
                        <div class="col-md-3">
                            <div class="widget widget-shadow text-center">
                                <div class="widget-header">
                                    <div class="widget-header-content">
                                        <?php
                                        if($row->user->imagem){
                                            $imgAvatar = route('portal.condominium.user.image', ['id' => $row->user->id, 'image' => $row->user->imagem]);
                                        }else{
                                            $imgAvatar = asset('portal/assets/images/user-not-image.jpg');
                                        }
                                        ?>
                                        @if($imgAvatar)
                                        <a class="avatar avatar-lg" href="{{ route('portal.condominium.user.show',['id' => $row->id]) }}">
                                            <img src="{{ $imgAvatar }}" alt="{{ $row->user->name }}">
                                        </a>
                                        @endif
                                        <h5 class="profile-user">{{ $row->user->name }}</h5>
                                        <p class="profile-job">{{ $row->userRoleCondominium->name }}</p>
                                            @if($row->userUnit->toArray())
                                                <p>
                                                    <i class="icon icon-color md-pin" aria-hidden="true"></i>
                                                    <?php
                                                    $cont = 0;
                                                    foreach ($row->userUnit as $unit) {
                                                        $cont++;
                                                        if ($cont > 1) {
                                                            echo ', ';
                                                        }
                                                        echo $unit->unit->name . ' - ' . $unit->unit->block->name;
                                                    }
                                                    ?>
                                                </p>
                                            @endif
                                            <p>
                                        </p>
                                        <a href="{{ route('portal.condominium.user.show',['id' => $row->id]) }}"
                                           title="Visualizar"
                                           class="btn btn-icon bg-success waves-effect waves-light">
                                            <i class="icon wb-zoom-in" aria-hidden="true"></i>
                                        </a>
                                        @can('update', $row)
                                        <a href="{{ route('portal.condominium.user.edit',['id' => $row->id]) }}"
                                           title="Editar"
                                           class="btn btn-icon bg-warning waves-effect waves-light">
                                            <i class="icon wb-edit" aria-hidden="true"></i>
                                        </a>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3 class="page-title text-center padding-top-20">
                                    Nenhum integrante vinculado a este condomínio.
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @if(session()->get('admin') == 'y')
    <a href="{{ route('portal.condominium.user.create') }}" title="Cadastrar"
       class="site-action site-floataction btn-raised btn btn-success btn-floating"
       data-toggle="tooltip"
       data-original-title="Cadastrar">
        <i class="icon md-plus" aria-hidden="true"></i>
    </a>
    @endif

@endsection