<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo Form::label('tags_id', 'Tag? *'); ?>

            <select class="form-control" required="required" id="tags_id" name="tags_id">
                <option value="">Selecione</option>
                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </select>
        </div>
    </div>
    <?php echo Form::hidden('blog_id', $id, ['required' => 'required']); ?>

</div>
<br />