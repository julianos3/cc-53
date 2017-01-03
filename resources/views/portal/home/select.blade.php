@extends('portal.layouts.portal')
@section('content')

    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">Central Condo</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="{{ route('portal.home.index') }}">Home</a></li>
                <li class="active">Selecione seu condomínio</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">
                    @include('success._check')
                    @include('errors._check')
                    @include('portal.modals.delete')

                    {!! Form::open(['route'=>'portal.condominium.access', 'id' => 'formSelectCondominium']) !!}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="id">Condomínio: </label>
                                <select class="form-control" name="id" id="id" required="required">
                                    @foreach($dados as $row)
                                        <option value="{{ $row->condominium_id }}">{{ $row->condominium->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="route" id="route" value="{{ route('portal.condominium.access', ['id' => 0]) }}" required />

                    <div class="form-group text-right">
                        {!! Form::button('Acessar Condomínio', ['type' => 'submit', 'class'=>'btn btn-raised btn-primary waves-effect waves-light']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection