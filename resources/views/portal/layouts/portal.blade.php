<!DOCTYPE html>
<html class="no-js css-menubar" lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <title>Central Condo - Seu condomínio nas nuves</title>

    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="apple-mobile-web-app-title" content="{{ config('app.name') }}"/>

    <link rel="apple-touch-icon" href="{{ asset('portal/assets/images/icons/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('portal/assets/images/icons/apple-touch-icon-57x57.png') }}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('portal/assets/images/icons/apple-touch-icon-72x72.png') }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('portal/assets/images/icons/apple-touch-icon-76x76.png') }}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('portal/assets/images/icons/apple-touch-icon-114x114.png') }}" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('portal/assets/images/icons/apple-touch-icon-120x120.png') }}" />
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('portal/assets/images/icons/apple-touch-icon-144x144.png') }}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('portal/assets/images/icons/apple-touch-icon-152x152.png') }}" />

    <meta name="application-name" content="{{ config('app.name') }}"/>
    <meta name="msapplication-TileColor" content="#000000"/>
    <meta name="msapplication-TileImage" content="{{ asset('portal/assets/images/icons/apple-touch-icon.png') }}"/>
    <link rel="shortcut icon" href="{{ asset('portal/assets/images/favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('portal/assets/images/favicon.ico') }}" type="image/x-icon" />

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
    <link rel="stylesheet" href="{{ asset('portal/global/vendor/waves/waves.min.css') }}">
    <link rel="stylesheet" href="{{ asset('portal/global/vendor/filament-tablesaw/tablesaw.min.css') }}">
    <link rel="stylesheet" href="{{ asset('portal/global/vendor/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('portal/global/vendor/bootstrap-select/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('portal/global/vendor/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('portal/global/fonts/material-design/material-design.min.css') }}">
    <link rel="stylesheet" href="{{ asset('portal/global/fonts/brand-icons/brand-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('portal/global/fonts/web-icons/web-icons.min.css') }}">

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
<body class="page-user page-profile  @if(session()->get('user_id') == '') padding-top-0 @endif">

<!--[if lt IE 8]>
<p class="browserupgrade">
    Você esta usando um navegador <strong>desatualizado.</strong> Por favor,
    <a href="http://browsehappy.com/">atualize seu navegador</a> para melhorar a sua experiência.
</p>
<![endif]-->

@if(session()->get('user_id') != '')
    @include('portal.layouts.header')
    @include('portal.layouts.menu')
@endif

@yield('content')

<footer class="site-footer">
    <div class="site-footer-legal">© 2017 <a href="http://www.centralcondo.com.br">Central Condo</a></div>
    <div class="site-footer-right">
        Feito com <i class="red-600 wb wb-heart"></i></a>
    </div>
</footer>
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
<script src="{{ asset('portal/global/vendor/slidepanel/jquery-slidePanel.min.js') }}"></script>
<script src="{{ asset('portal/global/vendor/filament-tablesaw/tablesaw.js') }}"></script>
<script src="{{ asset('portal/global/vendor/filament-tablesaw/tablesaw-init.js') }}"></script>
<script src="{{ asset('portal/global/vendor/asbreadcrumbs/jquery-asBreadcrumbs.min.js') }}"></script>
<script src="{{ asset('portal/global/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('portal/global/vendor/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('portal/global/vendor/formatter-js/jquery.formatter.min.js') }}"></script>
<script src="{{ asset('portal/global/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('portal/global/js/plugins/responsive-tabs.min.js') }}"></script>
<script src="{{ asset('portal/global/vendor/matchheight/jquery.matchHeight-min.js') }}"></script>
<!-- Scripts -->
<script src="{{ asset('portal/global/js/core.min.js') }}"></script>
<script src="{{ asset('portal/assets/js/site.js') }}"></script>
<script src="{{ asset('portal/assets/js/app.js') }}"></script>
<script src="{{ asset('portal/assets/js/sections/menu.min.js') }}"></script>
<script src="{{ asset('portal/assets/js/sections/menubar.min.js') }}"></script>
<script src="{{ asset('portal/assets/js/sections/gridmenu.min.js') }}"></script>
<script src="{{ asset('portal/assets/js/sections/sidebar.min.js') }}"></script>
<script src="{{ asset('portal/global/js/components/components.js') }}"></script>
<script>
    (function(document, window, $) {
        'use strict';
        var Site = window.Site;
        $(document).ready(function() {
            Site.run();
        });
    })(document, window, jQuery);
</script>
</body>
</html>