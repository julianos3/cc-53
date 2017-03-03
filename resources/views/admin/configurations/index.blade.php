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
                @if($dados->isEmpty())
                <div class="text-center">
                    <h4>Nenhum registro encontrado ou cadastrado.</h4>
                </div>
                @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-condensed mb-none">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th class="col-md-2 text-center">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($dados as $row)
                            <tr>
                                <td>{{ $row->title }}</td>
                                <td class="actions text-center">
                                    <a href="{{ route('admin.configurations.edit', ['id' => $row->id]) }}" class="on-default edit-row" title="Editar">
                                        <i class="fa fa-pencil"></i>
                                        Editar
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
