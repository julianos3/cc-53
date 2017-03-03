<div class="modal fade modal-success" id="addNewEvent" aria-hidden="true" aria-labelledby="addNewEvent"
     role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Reservar</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'portal.condominium.diary.store']) !!}

                @include('portal.condominium.diary.modals._form')

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="icon md-check" aria-hidden="true"></i>
                        Sim, Reservar
                    </button>
                    <a class="btn btn-dark waves-effect waves-light" data-dismiss="modal" href="javascript:void(0)">Cancelar</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>