<?php if(!$dados->isEmpty()): ?>
    <div class="row">
        <div class="col-md-12">
            <table class="tablesaw table-striped table-bordered table-hover"
                   data-tablesaw-mode="swipe"
                   data-tablesaw-sortable data-tablesaw-minimap>
                <thead>
                <tr>
                    <th data-tablesaw-sortable-col data-tablesaw-sortable-default-col
                        data-tablesaw-priority="persist">Observação
                    </th>
                    <th data-tablesaw-sortable-col data-tablesaw-priority="1">Data Realizada</th>
                    <th data-tablesaw-sortable-col data-tablesaw-priority="2">Fornecedor</th>

                    <?php if(session()->get('admin') == 'y'): ?>
                    <th class="text-center col-md-3">
                        Ação
                    </th>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        <td><?php echo e($row->description); ?></td>
                        <td><?php echo e(date('d/m/Y', strtotime($row->date))); ?></td>
                        <td><?php echo e($row->provider->name); ?></td>

                        <?php if(session()->get('admin') == 'y'): ?>
                        <td class="text-center">
                            <a href="<?php echo e(route('portal.manage.maintenance.completed.edit', ['id' => $row->id])); ?>"
                               title="Editar"
                               data-toggle="tooltip"
                               data-original-title="Editar"
                               class="btn btn-icon bg-warning waves-effect waves-light">
                                <i class="icon wb-edit" aria-hidden="true"></i>
                            </a>
                        </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php else: ?>
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-title text-center">
                Nenhum registro realizado.
            </h4>
        </div>
    </div>
<?php endif; ?>