<?php echo Form::open(['route'=>'portal.communication.message.public.store']); ?>


<?php echo $__env->make('portal.communication.message.public._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="form-group text-right">
    <button type="submit" data-toggle="tooltip" data-original-title="Enviar Mensagem" class="btn btn-success waves-effect waves-light">
        <i class="icon md-check" aria-hidden="true"></i>
        Enviar Mensagem
    </button>
</div>

<?php echo Form::close(); ?>