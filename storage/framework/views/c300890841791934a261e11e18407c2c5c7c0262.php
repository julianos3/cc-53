<!doctype html>
<html class="fixed">
<head>

    <title><?php echo e(config('app.name')); ?></title>
    <!-- Basic -->
    <meta charset="UTF-8">

    <meta name="keywords" content="Agência S3"/>
    <meta name="description" content="Agência S3 CMS">
    <meta name="author" content="agencias3.com.br">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
          rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendor/bootstrap/css/bootstrap.css')); ?>"/>

    <link rel="stylesheet" href="<?php echo e(asset('admin/vendor/font-awesome/css/font-awesome.css')); ?>"/>

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/theme.css')); ?>"/>

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/theme-custom.css')); ?>"/>

    <!-- Head Libs -->
    <script src="<?php echo e(asset('admin/vendor/modernizr/modernizr.js')); ?>"></script>
</head>
<body>

<?php echo $__env->yieldContent('content'); ?>

<!-- Vendor -->
<script src="assets/vendor/jquery/jquery.js"></script>
<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="assets/vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="assets/vendor/style-switcher/style.switcher.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="assets/javascripts/theme.js"></script>

<!-- Theme Initialization Files -->
<script src="assets/javascripts/theme.init.js"></script>

</body>
</html>