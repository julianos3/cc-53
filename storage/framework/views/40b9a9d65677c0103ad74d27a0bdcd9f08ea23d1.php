<?php echo Form::model($dados, ['route'=>['portal.condominium.diary.update', $dados->id]]); ?>


    <?php echo $__env->make('portal.condominium.diary.modals._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="form-group text-right">
        <?php if($dados->user_condominium_id == session()->get('user_condominium_id') || session()->get('admin') == 'y'): ?>
            <?php if($dados->date >= \Carbon\Carbon::now() || session()->get('admin') == 'y'): ?>
                <button title="Excluir"
                    type="button"
                    class="btn btn-icon bg-danger waves-effect waves-light btnDelete"
                    data-target="#modalDelete" data-toggle="modal"
                    data-route="<?php echo e(route('portal.condominium.diary.destroy', ['id' => $dados->id])); ?>"
                    data-dismiss="modal">
                    <i class="icon wb-trash" aria-hidden="true"></i>
                    Excluir
                 </button>
            <?php endif; ?>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">
            <i class="icon md-check" aria-hidden="true"></i>
            Sim, Alterar
        </button>
        <a class="btn btn-dark waves-effect waves-light" data-dismiss="modal" href="javascript:void(0)">Cancelar</a>
    </div>
<?php echo Form::close(); ?>