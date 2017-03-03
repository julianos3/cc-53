<!-- Main Content -->
<?php $__env->startSection('content'); ?>
    <section class="body-sign">
        <div class="center-sign">

            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Recuperar Senha</h2>
                </div>
                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="alert alert-info">
                        <p class="m-none text-semibold h6">Digite o seu e-mail abaixo e uma nova senha será enviada!</p>
                    </div>

                    <form role="form" method="POST" action="<?php echo e(url('/admin/password/email')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group mb-none<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <div class="input-group">
                                <input name="email" type="email" placeholder="E-mail" class="form-control input-lg" value="<?php echo e(old('email')); ?>" required/>
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-lg" type="submit">Recuperar!</button>
                                </span>
                            </div>
                            <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <p class="text-center mt-lg">Lembrou? <a href="<?php echo e(url('/admin/login')); ?>">Login!</a>
                    </form>
                </div>
            </div>

            <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2017. Todos os direitos reservados.</p>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>