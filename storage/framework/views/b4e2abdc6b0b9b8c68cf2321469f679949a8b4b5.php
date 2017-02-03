<?php echo Form::open(['route'=>'portal.condominium.provider.storeAjax', 'id' => 'createAjaxProvider']); ?>


<?php echo $__env->make('portal.condominium.provider._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="form-group text-right">
    <?php echo Form::button('Cadastrar', ['type' => 'submit', 'class'=>'btn btn-raised btn-primary waves-effect waves-light']); ?>

</div>

<?php echo Form::close(); ?>