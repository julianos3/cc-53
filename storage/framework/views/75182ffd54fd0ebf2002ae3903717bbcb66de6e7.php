<?php if(!$communication->isEmpty()): ?>
    <?php echo $__env->make('portal.communication.communication.modal.modal_show', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                        <?php $__currentLoopData = $communication; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td><?php echo e($row->communication->id); ?></td>
                            <td><?php echo e($row->communication->name); ?></td>
                            <td><?php echo e(date('d/m/Y', strtotime($row->created_at))); ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-icon btn-pure btn-default btnShowModal"
                                        data-target="#modalShowCommunication" data-toggle="modal"
                                        data-route="<?php echo e(route('portal.communication.communication.show', ['id' => $row->communication_id])); ?>"
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