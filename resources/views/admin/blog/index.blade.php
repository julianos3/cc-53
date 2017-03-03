@extends('admin.layouts.app')

@section('content')

    <section role="main" class="content-body">
        <header class="page-header">
            <h2>{{ $config['title'] }}</h2>
            <div class="right-wrapper pull-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="{{ route('admin.home.index') }}">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li><span>Home</span></li>
                    <li><span>{{ $config['title'] }}</span></li>
                </ol>
                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
            </div>
        </header>
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">{{ $config['title'] }}</h2>
            </header>
            <div class="panel-body">

                @include('admin.layouts._msg')
                @include('admin.modals._delete')

                <div class="row">
                    <div class="col-sm-12 text-right">
                        <div class="mb-md">
                            <a href="{{ route('admin.blog.create') }}" title="Cadastrar" class="btn btn-success"><i class="fa fa-plus"></i> Cadastrar</a>
                        </div>
                    </div>
                </div>

                @if($dados->isEmpty())
                <div class="text-center">
                    <h4>Nenhum registro encontrado ou cadastrado.</h4>
                </div>
                @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-condensed mb-none">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th class="col-md-2 text-center">Data</th>
                                <th class="col-md-2 text-center">Data Publicação</th>
                                <th class="col-md-1 text-center">Ativo</th>
                                <th class="col-md-4 text-center">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($dados as $row)
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td class="text-center">{{ date('d/m/Y', strtotime($row->date)) }}</td>
                                <td class="text-center">{{ date('d/m/Y H:i', strtotime($row->date_publish)) }}</td>
                                <td class="text-center">
                                    <div class="switch ativo switch-sm switch-success">
                                        <input type="checkbox" name="switch" data-route="{{ route('admin.blog.active', ['id' => $row->id]) }}" data-plugin-ios-switch @if($row->active == 'y') checked="checked" @endif />
                                    </div>
                                </td>
                                <td class="actions text-center">
                                    <a href="{{ route('admin.blog.tags.index', ['id' => $row->id]) }}" class="on-default edit-row" title="Tags">
                                        <i class="fa fa-tags"></i>
                                        Tags
                                    </a>
                                    <a href="{{ route('admin.blog.galery.index', ['id' => $row->id]) }}" class="on-default edit-row" title="Galeria">
                                        <i class="fa fa-image"></i>
                                        Galeria
                                    </a>
                                    <a href="{{ route('admin.blog.edit', ['id' => $row->id]) }}" class="on-default edit-row" title="Editar">
                                        <i class="fa fa-pencil"></i>
                                        Editar
                                    </a>
                                    <a href="#modalAnim" data-route="{{ route('admin.blog.destroy', ['id' => $row->id]) }}" class="on-default excluir remove-row" title="Excluir">
                                        <i class="fa fa-trash-o"></i>
                                        Excluir
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $dados->links() }}
                @endif
            </div>
        </section>

@endsection
