<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title"><?php echo e($config['title']); ?></h4>
</div>
<?php echo Form::model($dados, ['route'=>['portal.condominium.group.update', $dados->id]]); ?>

<div class="modal-body">
    <?php echo $__env->make('portal.condominium.group._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="modal-footer text-right">
    <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
    <button type="submit" data-toggle="tooltip" data-original-title="Atualizar Grupo" class="btn btn-success waves-effect waves-light">
        <i class="icon md-check" aria-hidden="true"></i>
        Atualizar Grupo
    </button>
</div>
<?php echo Form::close(); ?>

