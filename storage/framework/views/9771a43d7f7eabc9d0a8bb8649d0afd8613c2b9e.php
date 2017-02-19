<div class="modal fade modal-success" id="modalGroupCreate" aria-hidden="true" aria-labelledby="modalGroupCreate"
     role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo Form::open(['route'=>'portal.condominium.group.store']); ?>

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Cadastrar Grupo</h4>
            </div>
            <div class="modal-body">
                <?php echo $__env->make('portal.condominium.group._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="modal-footer text-right">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                <button type="submit" data-toggle="tooltip" data-original-title="Cadastrar Grupo" class="btn btn-success waves-effect waves-light">
                    <i class="icon md-check" aria-hidden="true"></i>
                    Cadastrar Grupo
                </button>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>