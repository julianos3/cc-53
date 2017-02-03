<?php if(!$called->isEmpty()): ?>
    <?php echo $__env->make('portal.communication.called.modal.modal_show', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                        <?php $__currentLoopData = $called; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td><?php echo e($row->id); ?></td>
                            <td><?php echo e($row->subject); ?></td>
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
                                <span class="label <?php echo e($colorStatus); ?>">
                                    <?php echo e($row->calledStatus->name); ?>

                                </span>
                            </td>
                            <td><?php echo e($row->calledCategory->name); ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-icon btn-pure btn-default btnShowCalled"
                                        data-target="#modalCalled" data-toggle="modal"
                                        data-id="<?php echo e($row->id); ?>"
                                        data-original-title="Visualizar">
                                    <i class="icon md-search" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php endif; ?>