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
                    <li><span>{{ $config['action'] }}</span></li>
                </ol>

                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
            </div>
        </header>
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">{{ $config['title'].' > '.$config['action'] }}</h2>
            </header>

            {!! Form::open(['route'=>'admin.blog.tags.store', 'files'=> true]) !!}
                <div class="panel-body">

                    @include('admin.layouts._msg')
                    @include('admin.modals._delete')

                    <?php
                    $idRoute = $id;
                    $routeBack = route('admin.blog.edit', ['id' => $id]);
                    ?>

                    @include('admin.blog.inc.menu')

                    @include('admin.blog._form_tags')

                </div>
                <footer class="panel-footer text-right">
                    <button type="submit"
                            class="btn btn-raised btn-success waves-effect waves-light">
                        <i class="icon wb-plus" aria-hidden="true"></i>
                        Adicionar Tag
                    </button>
                </footer>
            {!! Form::close() !!}
        </section>

        @if(!$dados->isEmpty())
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Tags</h2>
            </header>
            <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped table-condensed mb-none">
                            <thead>
                            <tr>
                                <th>Tag</th>
                                <th class="col-md-2 text-center">Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dados as $row)
                                <tr>
                                    <td>{{ $row->tags->name }}</td>
                                    <td class="actions text-center">
                                        <a href="#modalAnim" data-route="{{ route('admin.blog.tags.destroy', ['id' => $row->id]) }}" class="on-default excluir remove-row" title="Excluir">
                                            <i class="fa fa-trash-o"></i>
                                            Excluir
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        @endif
@endsection
