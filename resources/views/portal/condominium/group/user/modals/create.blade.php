<div class="modal fade modal-success" id="modalGroupUser" aria-hidden="true" aria-labelledby="modalGroupUser"
     role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['route' => 'portal.condominium.group.user.store', 'idGroup' => $groupId]) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Adicionar Integrante</h4>
            </div>
            <div class="modal-body">
                @include('portal.condominium.group.user._form')
            </div>
            <div class="modal-footer text-right">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                <button type="submit" data-toggle="tooltip" data-original-title="Cadastrar Integrantes" class="btn btn-success waves-effect waves-light">
                    <i class="icon md-check" aria-hidden="true"></i>
                    Cadastrar Integrantes
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>