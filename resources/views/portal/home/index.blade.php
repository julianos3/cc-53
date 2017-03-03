@extends('portal.layouts.portal')

@section('content')
    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">{{ $condominium->name }}</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li class="active">{{ $condominium->name }}</li>
            </ol>
        </div>

        <div class="page-content container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">
                @include('portal.home.inc.alert_condominium')
                @include('portal.home.inc.statistics')
                @include('portal.home.inc.called')
                @include('portal.home.inc.communication')
            </div>
        </div>

    </div>

@endsection