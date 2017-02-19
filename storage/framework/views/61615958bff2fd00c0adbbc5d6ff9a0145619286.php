<?php if(session('status')): ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>