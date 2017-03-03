<!doctype html>
<html class="fixed">
<head>

    <meta charset="UTF-8">

    <title>Agência S3 - <?php echo e(config('app.name')); ?></title>

    <meta name="keywords" content="Agência S3"/>
    <meta name="description" content="Agência S3 CMS">
    <meta name="author" content="agencias3.com.br">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendor/bootstrap/css/bootstrap.css')); ?>"/>

    <link rel="stylesheet" href="<?php echo e(asset('admin/vendor/font-awesome/css/font-awesome.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendor/magnific-popup/magnific-popup.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendor/bootstrap-datepicker/css/datepicker3.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('admin/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css')); ?>" />


    <!-- galeria de imagem -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/gallery.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/uploadifive.css')); ?>" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/theme.css')); ?>"/>

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/theme-custom.css')); ?>"/>

    <!-- Head Libs -->
    <script src="<?php echo e(asset('admin/vendor/modernizr/modernizr.js')); ?>"></script>

    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

</head>
<body>
<section class="body">

    <?php echo $__env->make('admin.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="inner-wrapper">
        <?php echo $__env->make('admin.layouts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>

</section>

<!-- Vendor -->
<script src="<?php echo e(asset('admin/vendor/jquery/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js')); ?>"></script>
<script src="<?php echo e(asset('admin/vendor/jquery-cookie/jquery.cookie.js')); ?>"></script>
<script src="<?php echo e(asset('admin/vendor/style-switcher/style.switcher.js')); ?>"></script>
<script src="<?php echo e(asset('admin/vendor/bootstrap/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('admin/vendor/nanoscroller/nanoscroller.js')); ?>"></script>
<script src="<?php echo e(asset('admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('admin/vendor/magnific-popup/magnific-popup.js')); ?>"></script>
<script src="<?php echo e(asset('admin/vendor/jquery-placeholder/jquery.placeholder.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/modals.js')); ?>"></script>

<script src="<?php echo e(asset('admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(asset('admin/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')); ?>" />

<script src="<?php echo e(asset('admin/js/style.switcher.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/ios7-switch.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/ativo.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/lightbox.js')); ?>"></script>

<link rel="stylesheet" href="<?php echo e(asset('admin/vendor/bootstrap-datepicker/css/datepicker3.css')); ?>" />
<script src="<?php echo e(asset('admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('admin/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js')); ?>"></script>

<!--
<script src="<?php echo e(asset('admin/js/datepicker.js')); ?>public/js/jquery.maskedinput.js"></script>
<script src="public/js/jquery.masked.js"></script>
-->
<script src="<?php echo e(asset('admin/vendor/jquery-maskedinput/jquery.maskedinput.js')); ?>"></script>


<!-- Theme Base, Components and Settings -->
<script src="<?php echo e(asset('admin/js/theme.js')); ?>"></script>

<!-- Theme Initialization Files -->
<script src="<?php echo asset('admin/js/theme.init.js'); ?>"></script>

<?php if(isset($config['galery']) && $config['galery']): ?>

<script src="<?php echo e(asset('admin/js/gallery/mediagallery.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/gallery/jquery-1.4.3.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/gallery/jquery-ui-1.8.6.custom.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/gallery/jquery.scrollto.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/gallery/gallery.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/gallery/jquery.uploadifive.min.js')); ?>" type="text/javascript"></script>
<?php echo e($timestamp = time()); ?>

<script>
    $(function() {
        $('#file_upload').uploadifive({
            'auto'             : false,
            'checkScript'      : 'check-exists.php',
            'buttonText'       : 'Selecionar Imagem',
            'formData'         : {
                'timestamp' : '<?php echo e($timestamp); ?>',
                '_token'    : '<?php echo e(csrf_token()); ?>',
                'token'     : '<?php echo e(md5('unique_salt' . $timestamp)); ?>'
            },
            'queueID'          : 'queue',
            'uploadScript'     : '<?php if(isset($routeUpload) && $routeUpload != ''): ?><?php echo e($routeUpload); ?><?php endif; ?>',
            'onQueueComplete': function() {
                location.reload();
            }
        });
    });
</script>
    <?php endif; ?>
</body>
</html>