<!-- Main Content -->
<?php $__env->startSection('content'); ?>
    <section class="body-sign">
        <div class="center-sign">

            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Trocar Senha</h2>
                </div>
                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <form role="form" method="POST" action="<?php echo e(url('/admin/password/reset')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <input type="hidden" name="token" value="<?php echo e($token); ?>">

                        <div class="form-group mb-lg <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email">E-mail</label>
                            <div class="input-group input-group-icon">
                                <input name="email" type="email" id="email" value="<?php echo e(isset($email) ? $email : old('email')); ?>" class="form-control input-lg" required autofocus/>
                            </div>
                            <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group mb-lg <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <div class="clearfix">
                                <label class="pull-left" id="password">Senha</label>
                            </div>
                            <div class="input-group input-group-icon">
                                <input name="password" type="password" id="password" class="form-control input-lg" required />
                            </div>
                            <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group mb-lg<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                            <div class="clearfix">
                                <label class="pull-left" id="password-confirm">Confirmar Senha</label>
                            </div>
                            <div class="input-group input-group-icon">
                                <input name="password_confirmation" type="password" id="password-confirm" class="form-control input-lg" required />
                            </div>
                            <?php if($errors->has('password_confirmation')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-default hidden-xs">Trocar Senha</button>
                                <button type="submit" class="btn btn-default btn-block btn-lg visible-xs mt-lg">Trocar Senha</button>
                            </div>
                            <br /><br />
                        </div>
                    </form>
                </div>
            </div>

            <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2017. Todos os direitos reservados.</p>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>