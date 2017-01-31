@if(!$called->isEmpty())
    @include('portal.communication.called.modal.modal_show')
    <div class="col-xlg-5 col-md-6">
        <div class="panel" id="called">
            <div class="panel-heading">
                <h3 class="panel-title">Últimos Chamados</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Assunto</td>
                            <td>Status</td>
                            <td>Tipo</td>
                            <td class="col-md-2">Ação</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($called as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->subject }}</td>
                            <td>
                                <?php
                                    $colorStatus = 'label-default';
                                    if($row->called_status_id == 1){
                                        $colorStatus = 'label-warning';
                                    }elseif($row->called_status_id == 2){
                                        $colorStatus = 'label-success';
                                    }elseif($row->called_status_id == 3){
                                        $colorStatus = 'label-danger';
                                    }
                                ?>
                                <span class="label {{ $colorStatus }}">
                                    {{ $row->calledStatus->name }}
                                </span>
                            </td>
                            <td>{{ $row->calledCategory->name }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-icon btn-pure btn-default btnShowCalled"
                                        data-target="#modalCalled" data-toggle="modal"
                                        data-id="{{ $row->id }}"
                                        data-original-title="Visualizar">
                                    <i class="icon md-search" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif