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
                    <div class="col-md-12 text-right">
                        <a href="{{ route('admin.partner-form.export') }}" class="mb-xs mt-xs mr-xs btn btn-warning"><i class="fa fa-file-excel-o"></i> Exportar</a><br /><br />
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
                                <th>E-mail</th>
                                <th class="text-center">Lido</th>
                                <th class="text-center">Data</th>
                                <th class="col-md-3 text-center">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($dados as $row)
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td class="text-center"><i class="fa  @if($row->view == 'y') fa-check-square alert-success @else fa-times-circle alert-danger @endif"></i></td>
                                <td class="text-center">{{ date('d/m/Y h:i', strtotime($row->created_at)) }}</td>
                                <td class="actions text-center">
                                    <a href="{{ route('admin.partner-form.show', ['id' => $row->id]) }}" class="on-editing cancel-row" title="Visualizar">
                                        <i class="fa fa-search-plus"></i>
                                        Visualizar
                                    </a>
                                    <a href="#modalAnim" data-route="{{ route('admin.partner-form.destroy', ['id' => $row->id]) }}" class="on-default excluir remove-row" title="Excluir">
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
