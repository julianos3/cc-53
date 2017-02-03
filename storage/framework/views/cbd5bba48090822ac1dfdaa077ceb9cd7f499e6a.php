<?php $__env->startSection('content'); ?>

    <div class="page animsition">
        <div class="page-header">
            <h1 class="page-title">Central Condo</h1>
            <ol class="breadcrumb" data-plugin="breadcrumb">
                <li><a href="<?php echo e(route('portal.home.index')); ?>">Home</a></li>
                <li class="active">Selecione seu condomínio</li>
            </ol>
        </div>
        <div class="page-content">
            <div class="panel">
                <div class="panel-body">
                    <?php echo $__env->make('success._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('errors._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->make('portal.modals.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php echo Form::open(['route'=>'portal.condominium.access', 'id' => 'formSelectCondominium']); ?>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="id">Condomínio: </label>
                                <select class="form-control" name="id" id="id" required="required">
                                    <?php $__currentLoopData = $dados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo e($row->condominium_id); ?>"><?php echo e($row->condominium->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="route" id="route" value="<?php echo e(route('portal.condominium.access', ['id' => 0])); ?>" required />

                    <div class="form-group text-right">
                        <?php echo Form::button('Acessar Condomínio', ['type' => 'submit', 'class'=>'btn btn-raised btn-primary waves-effect waves-light']); ?>

                    </div>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('portal.layouts.portal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>