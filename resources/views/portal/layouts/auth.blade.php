<!DOCTYPE html>
<html class="no-js css-menubar" lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <title>Login | Central Condo</title>

    <link rel="apple-touch-icon" href="{{ asset('portal/assets/images/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('portal/assets/images/favicon.ico') }}">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('portal/global/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('portal/global/css/bootstrap-extend.min.css') }}">
    <link rel="stylesheet" href="{{ asset('portal/assets/css/site.min.css') }}">
    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('portal/global/vendor/animsition/animsition.min.css') }}">
    <link rel="stylesheet" href="{{ asset('portal/global/vendor/asscrollable/asScrollable.min.css') }}">
    <link rel="stylesheet" href="{{ asset('portal/global/vendor/switchery/switchery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('portal/global/vendor/intro-js/introjs.min.css') }}">
    <link rel="stylesheet" href="{{ asset('portal/global/vendor/slidepanel/slidePanel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('portal/global/vendor/flag-icon-css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('portal/assets/pages/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('portal/assets/pages/css/forgot-password.css') }}">
    <link rel="stylesheet" href="{{ asset('portal/global/vendor/waves/waves.min.css') }}">

    <link rel="stylesheet" href="{{ asset('portal/assets/pages/css/register.css') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('portal/global/fonts/material-design/material-design.min.css') }}">
    <link rel="stylesheet" href="{{ asset('portal/global/fonts/web-icons/web-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('portal/global/fonts/brand-icons/brand-icons.min.css') }}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <!--[if lt IE 9]>
    <script src="{{ asset('portal/global/vendor/html5shiv/html5shiv.min.js') }}"></script>
    <![endif]-->
    <!--[if lt IE 10]>
    <script src="{{ asset('portal/global/vendor/media-match/media.match.min.js') }}"></script>
    <script src="{{ asset('portal/global/vendor/respond/respond.min.js') }}"></script>
    <![endif]-->
    <!-- Scripts -->
    <script src="{{ asset('portal/global/vendor/modernizr/modernizr.min.js') }}"></script>
    <script src="{{ asset('portal/global/vendor/breakpoints/breakpoints.min.js') }}"></script>
    <script>
        Breakpoints();
    </script>
</head>

@yield('content')

<!-- Core  -->
<script src="{{ asset('portal/global/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('portal/global/vendor/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('portal/global/vendor/animsition/animsition.min.js') }}"></script>
<script src="{{ asset('portal/global/vendor/asscroll/jquery-asScroll.min.js') }}"></script>
<script src="{{ asset('portal/global/vendor/mousewheel/jquery.mousewheel.min.js') }}"></script>
<script src="{{ asset('portal/global/vendor/asscrollable/jquery.asScrollable.all.min.js') }}"></script>
<script src="{{ asset('portal/global/vendor/ashoverscroll/jquery-asHoverScroll.min.js') }}"></script>
<script src="{{ asset('portal/global/vendor/waves/waves.min.js') }}"></script>
<!-- Plugins -->
<script src="{{ asset('portal/global/vendor/switchery/switchery.min.js') }}"></script>
<script src="{{ asset('portal/global/vendor/intro-js/intro.min.js') }}"></script>
<script src="{{ asset('portal/global/vendor/screenfull/screenfull.min.js') }}"></script>
<script src="{{ asset('portal/global/vendor/slidepanel/jquery-slidePanel.min.js') }}"></script>
<script src="{{ asset('portal/global/vendor/jquery-placeholder/jquery.placeholder.min.js') }}"></script>
<!-- Scripts -->
<script src="{{ asset('portal/global/js/core.min.js') }}"></script>
<script src="{{ asset('portal/assets/js/site.js') }}"></script>
<script src="{{ asset('portal/assets/js/sections/menu.min.js') }}"></script>
<script src="{{ asset('portal/assets/js/sections/menubar.min.js') }}"></script>
<script src="{{ asset('portal/assets/js/sections/gridmenu.min.js') }}"></script>
<script src="{{ asset('portal/assets/js/sections/sidebar.min.js') }}"></script>
<script src="{{ asset('portal/global/js/configs/config-colors.min.js') }}"></script>
<script src="{{ asset('portal/assets/js/configs/config-tour.min.js') }}"></script>
<script src="{{ asset('portal/global/js/components/asscrollable.min.js') }}"></script>
<script src="{{ asset('portal/global/js/components/animsition.min.js') }}"></script>
<script src="{{ asset('portal/global/js/components/slidepanel.min.js') }}"></script>
<script src="{{ asset('portal/global/js/components/switchery.min.js') }}"></script>
<script src="{{ asset('portal/global/js/components/tabs.min.js') }}"></script>
<script src="{{ asset('portal/global/js/components/jquery-placeholder.min.js') }}"></script>
<script src="{{ asset('portal/global/js/components/animate-list.min.js') }}"></script>
<script src="{{ asset('portal/global/js/components/material.min.js') }}"></script>
<script>
    (function (document, window, $) {
        'use strict';
        var Site = window.Site;
        $(document).ready(function () {
            Site.run();
        });
    })(document, window, jQuery);
</script>
</body>
</html>