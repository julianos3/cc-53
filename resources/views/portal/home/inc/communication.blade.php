@if(!$communication->isEmpty())
    @include('portal.communication.communication.modal.modal_show')
    <div class="col-xlg-5 col-md-6">
        <div class="panel" id="communication">
            <div class="panel-heading">
                <h3 class="panel-title">Últimos Comunicados</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Título</td>
                            <td>Data</td>
                            <td class="col-md-2">Ação</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($communication as $row)
                        <tr>
                            <td>{{ $row->communication->id }}</td>
                            <td>{{ $row->communication->name }}</td>
                            <td>{{ date('d/m/Y', strtotime($row->created_at)) }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-icon btn-pure btn-default btnShowModal"
                                        data-target="#modalShowCommunication" data-toggle="modal"
                                        data-route="{{ route('portal.communication.communication.show', ['id' => $row->communication_id]) }}"
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