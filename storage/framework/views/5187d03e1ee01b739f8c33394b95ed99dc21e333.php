<?php $__env->startSection('content'); ?>
    <body class="page-forgot-password layout-full">
    <!--[if lt IE 8]>
    <p class="browserupgrade">
        Você esta usando um navegador <strong>desatualizado.</strong> Por favor,
        <a href="http://browsehappy.com/">atualize seu navegador</a> para melhorar a sua experiência.
    </p>
    <![endif]-->

    <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
         data-animsition-out="fade-out">
        <div class="page-content vertical-align-middle">
            <h2>Esqueceu a senha?</h2>
            <p>Insira seu e-mail cadastrado para redefinir sua senha</p>
            <form method="post" role="form" action="<?php echo e(url('/password/email')); ?>">
                <?php echo csrf_field(); ?>


                <?php echo $__env->make('success._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('errors._check', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="form-group">
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Seu email" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Redefinir sua senha</button>
                </div>
            </form>
            <footer class="page-copyright">
                <p>© 2017. Todos os direitos reservados.</p>
                <div class="social">
                    <a href="javascript:void(0)">
                        <i class="icon bd-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="javascript:void(0)">
                        <i class="icon bd-facebook" aria-hidden="true"></i>
                    </a>
                </div>
            </footer>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('portal.layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>