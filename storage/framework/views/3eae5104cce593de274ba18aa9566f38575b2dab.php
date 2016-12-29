<?php echo Form::open(['route'=>'portal.communication.message.public.store']); ?>


<?php echo $__env->make('portal.communication.message.public._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="form-group text-right">
    <?php echo Form::button('Enviar Mensagem', ['type' => 'submit', 'class'=>'btn btn-raised btn-primary waves-effect waves-light']); ?>

</div>

<?php echo Form::close(); ?>