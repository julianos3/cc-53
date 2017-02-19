@extends('portal.layouts.portal')

@section('content')

    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $config['title'] }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li><a href="{{ route('portal.condominium.index') }}">Condomínio</a></li>
                <li><a href="{{ route('portal.condominium.security-cam.index') }}">Câmeras de Segurança</a></li>
                <li class="active">{{ $config['title'] }}</li>
            </ol>
        </div>

        <div class="page-content container-fluid">
        <?php
        $urlBack = route('portal.condominium.security-cam.index');
        ?>
        @include('portal.layouts.btn_black')
        @if(!$dados->isEmpty())
            @foreach($dados  as $row)
            <div class="col-lg-4 col-sm-6">
                <div class="widget widget-shadow" id="widgetLineareaOne">
                    <div class="widget-content">
                        <div class="padding-20 padding-top-10">
                            <h4>{{ $row->name }}</h4>
                            <iframe width="100%" src="{{ $row->url }}" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-title">
                        <br />
                        Nenhuma câmera encontrada.
                    </h4>
                </div>
            </div>
        @endif
        </div>
    </div>

@endsection