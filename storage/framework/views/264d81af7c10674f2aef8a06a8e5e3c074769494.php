<!DOCTYPE html>
<html class="no-js css-menubar" lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <title><?php echo e($config['title']); ?> | Central Condo</title>

    <link rel="apple-touch-icon" href="<?php echo e(asset('portal/assets/images/apple-touch-icon.png')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('portal/assets/images/favicon.ico')); ?>">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo e(asset('portal/global/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('portal/global/css/bootstrap-extend.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('portal/assets/css/site.min.css')); ?>">
    <!-- Plugins -->
    <link rel="stylesheet" href="<?php echo e(asset('portal/global/vendor/animsition/animsition.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('portal/global/vendor/asscrollable/asScrollable.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('portal/global/vendor/switchery/switchery.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('portal/global/vendor/intro-js/introjs.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('portal/global/vendor/slidepanel/slidePanel.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('portal/global/vendor/flag-icon-css/flag-icon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('portal/global/vendor/waves/waves.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('portal/global/vendor/formvalidation/formValidation.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('portal/global/vendor/filament-tablesaw/tablesaw.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('portal/assets/css/uikit/modals.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('portal/assets/pages/css/profile.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('portal/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('portal/global/vendor/select2/select2.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('portal/global/vendor/bootstrap-select/bootstrap-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('portal/global/vendor/magnific-popup/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('portal/global/vendor/card/card.css')); ?>">

    <!--PAGES-->
    <link rel="stylesheet" href="<?php echo e(asset('portal/assets/pages/css/user.css')); ?>">
    <?php if(isset($config['page']) && $config['page'] == 'diary'): ?>
    <link rel="stylesheet" href="<?php echo e(asset('portal/assets/pages/css/diary.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('portal/global/vendor/fullcalendar/fullcalendar.css')); ?>">
    <?php endif; ?>

    <!-- Fonts -->
    <link rel="stylesheet" href="<?php echo e(asset('portal/global/fonts/material-design/material-design.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('portal/global/fonts/web-icons/web-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('portal/global/fonts/brand-icons/brand-icons.min.css')); ?>">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <!--[if lt IE 9]>
    <script src="<?php echo e(asset('portal/global/vendor/html5shiv/html5shiv.min.js')); ?>"></script>
    <![endif]-->
    <!--[if lt IE 10]>
    <script src="<?php echo e(asset('portal/global/vendor/media-match/media.match.min.js')); ?>"></script>
    <script src="<?php echo e(asset('portal/global/vendor/respond/respond.min.js')); ?>"></script>
    <![endif]-->
    <!-- Scripts -->
    <script src="<?php echo e(asset('portal/global/vendor/modernizr/modernizr.js')); ?>"></script>
    <script src="<?php echo e(asset('portal/global/vendor/breakpoints/breakpoints.js')); ?>"></script>
    <script>
        Breakpoints();
    </script>
</head>
<body class="page-user page-profile <?php if(isset($config['page']) && $config['page'] == 'diary'): ?> app-calendar <?php endif; ?> <?php if(session()->get('user_id') == ''): ?> padding-top-0 <?php endif; ?>">
<!--[if lt IE 8]>
<p class="browserupgrade">
    Você esta usando um navegador <strong>desatualizado.</strong> Por favor,
    <a href="http://browsehappy.com/">atualize seu navegador</a> para melhorar a sua experiência.
</p>
<![endif]-->

<?php if(session()->get('user_id') != ''): ?>
    <?php echo $__env->make('portal.layouts.topo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('portal.layouts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>

<?php echo $__env->yieldContent('content'); ?>

<footer class="site-footer">
    <div class="site-footer-legal">© 2017 <a href="http://www.centralcondo.com.br">Central Condo</a></div>
    <div class="site-footer-right">
        Feito com <i class="red-600 wb wb-heart"></i></a>
    </div>
</footer>

<!-- Core  -->
<script src="<?php echo e(asset('portal/global/vendor/jquery/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/bootstrap/bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/animsition/animsition.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/asscroll/jquery-asScroll.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/mousewheel/jquery.mousewheel.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/asscrollable/jquery.asScrollable.all.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/ashoverscroll/jquery-asHoverScroll.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/waves/waves.js')); ?>"></script>

<!-- Plugins -->
<script src="<?php echo e(asset('portal/global/vendor/switchery/switchery.min.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/intro-js/intro.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/screenfull/screenfull.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/slidepanel/jquery-slidePanel.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/formvalidation/formValidation.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/formvalidation/framework/bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/jquery-placeholder/jquery.placeholder.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/asbreadcrumbs/jquery-asBreadcrumbs.min.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/matchheight/jquery.matchHeight-min.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/jquery-wizard/jquery-wizard.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/formatter-js/jquery.formatter.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/filament-tablesaw/tablesaw.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/filament-tablesaw/tablesaw-init.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/bootstrap-select/bootstrap-select.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/magnific-popup/jquery.magnific-popup.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/vendor/card/jquery.card.js')); ?>"></script>

<!-- Scripts -->
<script src="<?php echo e(asset('portal/global/js/core.min.js')); ?>"></script>
<script src="<?php echo e(asset('portal/assets/js/site.js')); ?>"></script>
<script src="<?php echo e(asset('portal/assets/js/sections/menu.js')); ?>"></script>
<script src="<?php echo e(asset('portal/assets/js/sections/menubar.js')); ?>"></script>
<script src="<?php echo e(asset('portal/assets/js/sections/gridmenu.js')); ?>"></script>
<script src="<?php echo e(asset('portal/assets/js/sections/sidebar.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/js/configs/config-colors.js')); ?>"></script>
<script src="<?php echo e(asset('portal/assets/js/configs/config-tour.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/js/components/asscrollable.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/js/components/animsition.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/js/components/slidepanel.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/js/components/switchery.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/js/components/jquery-placeholder.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/js/plugins/responsive-tabs.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/js/components/tabs.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/js/components/asbreadcrumbs.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/js/components/matchheight.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/js/components/formatter-js.js')); ?>"></script>
<script src="<?php echo e(asset('portal/assets/js/app.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/js/components/tabs.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/js/components/select2.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/js/components/bootstrap-select.js')); ?>"></script>

<script src="<?php echo e(asset('portal/global/vendor/bootstrap-datepicker/bootstrap-datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/js/components/bootstrap-datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/js/components/magnific-popup.js')); ?>"></script>

<?php if(isset($config['page']) && $config['page'] == 'diary'): ?>
<script src="<?php echo e(asset('portal/global/vendor/fullcalendar/fullcalendar.js')); ?>"></script>
<script src="<?php echo e(asset('portal/global/js/plugins/action-btn.js')); ?>"></script>
<script src="<?php echo e(asset('portal/assets/pages/js/diary.js')); ?>"></script>
<?php endif; ?>
<script>
    (function (document, window, $) {
        'use strict';
        var Site = window.Site;
        $(document).ready(function () {
            Site.run();
        });
    })(document, window, jQuery);
</script>

<?php if(isset($config['stripe'])): ?>
<!-- stripe -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    Stripe.setPublishableKey('<?php echo e(env('STRIPE_KEY')); ?>');

    $(function() {
        var $form = $('#payment-form');
        $form.submit(function(event) {
            // Disable the submit button to prevent repeated clicks:
            $form.find('.submit').prop('disabled', true);

            // Request a token from Stripe:
            Stripe.card.createToken($form, stripeResponseHandler);

            // Prevent the form from being submitted:
            return false;
        });
    });

    function stripeResponseHandler(status, response) {
        // Grab the form:
        var $form = $('#payment-form');

        if (response.error) { // Problem!

            // Show the errors on the form:
            $form.find('.payment-errors').text(response.error.message);
            $form.find('.submit').prop('disabled', false); // Re-enable submission

        } else { // Token was created!

            // Get the token ID:
            var token = response.id;

            // Insert the token ID into the form so it gets submitted to the server:
            $form.append($('<input type="hidden" name="stripeToken">').val(token));

            // Submit the form:
            $form.get(0).submit();
        }
    };

</script>
    <?php endif; ?>


</body>
</html>