<?php $__env->startSection('content'); ?>
    <section class="body-sign">
        <div class="center-sign">
            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Login</h2>
                </div>
                <div class="panel-body">
                    <form action="<?php echo e(url('/admin/login')); ?>" role="form" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group mb-lg <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email">E-mail</label>
                            <div class="input-group input-group-icon">
                                <input name="email" type="email" id="email" value="<?php echo e(old('email')); ?>" class="form-control input-lg" />
                                <span class="input-group-addon">
                                    <span class="icon icon-lg">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </span>
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
                                <a href="<?php echo e(url('/admin/password/reset')); ?>" class="pull-right">Esqueceu a senha?</a>
                            </div>
                            <div class="input-group input-group-icon">
                                <input name="password" type="password" id="password" class="form-control input-lg" />
                                <span class="input-group-addon">
                                    <span class="icon icon-lg">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </span>
                            </div>
                            <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="checkbox-custom checkbox-default">
                                    <input id="remember" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> type="checkbox" />
                                    <label for="remember">Lembre-me</label>
                                </div>
                            </div>
                            <div class="col-sm-4 text-right">
                                <button type="submit" class="btn btn-default hidden-xs">Entrar</button>
                                <button type="submit" class="btn btn-default btn-block btn-lg visible-xs mt-lg">Entrar</button>
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