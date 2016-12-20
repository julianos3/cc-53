<div class="form-group">
    <label for="Block">Usuarios Condominio:</label>
    <select class="form-control" name="user_condominium_id">
        <?php $__currentLoopData = $usersCondominium; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <option value="<?php echo e($row->id); ?>" <?php if(isset($idUser) && $row->id === $idUser): ?> selected <?php endif; ?>><?php echo e($row->user->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </select>
</div>

<input type="hidden" name="group_id" value="<?php echo $groupId; ?>" />