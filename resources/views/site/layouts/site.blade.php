<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns:fb="http://ogp.me/ns/fb#">
<head>

    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}

    <title>{{ config('app.name') }}</title>
    <base href="{{ config('app.url') }}" />

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-W5LM6V9');</script>
    <!-- End Google Tag Manager -->

    <!-- metas -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="pt-br" />
    <meta name="rating" content="general" />
    <meta name="distribution" content="local"/>
    <meta name="Robots" content="All"/>
    <meta name="revisit" content="7 day" />
    <meta name="url" content="{{ config('app.url') }}" />
    <link rel="shortcut icon" href="{{ asset('portal/assets/images/favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('portal/assets/images/favicon.ico') }}" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('site/css/reset.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('site/css/estilo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('site/css/main.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('site/css/responsive.css') }}" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <script type="text/javascript" src="{{ asset('site/js/jquery.js') }}"></script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-72714852-1', 'auto');
        ga('send', 'pageview');

    </script>
</head>
<body class="def-100">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W5LM6V9"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="def-100" id="topo"></div>
<div class="fixed top-0 left-0 fix"></div>
<header class="def-100 fixed z-index-9995 p-top-15 p-bottom-15 @if(Route::current()->uri() != 'home' && Route::current()->uri() != '/') in-scroll page-internal @endif">
    <div class="def-center">
        <figure class="f-left c-left main-logo">
            <a href="{{ route('site.index') }}" title="{{ config('app.name') }}">
                <img src="{{ asset('site/images/main-logo.png') }}" title="{{ config('app.name') }}" alt="{{ config('app.name') }}" />
            </a>
        </figure>
        <div class="f-right none display-1024-block">
            <div class="f-right table button-action">
                <div class="inline">
                    <a class="f-left action-menu smooth" href="javascript:void(0);" title="ABRIR MENU">
                        <span class="def-100 p-top-5 bx-green b-radius-10"></span>
                        <span class="def-100 p-top-5 m-top-5 bx-green b-radius-10 m-top-5"></span>
                        <span class="def-100 p-top-5 bx-green b-radius-10 m-top-5"></span>
                    </a>
                </div>
            </div>
        </div>
        <nav class="f-right c-left m-top-25 main-menu m-top-1280-10 display-1024-none fixed-1024 top-1024-0 left-1024-0 w-1024-100 f-1024-l h-1024-100 m-top-1024-0">
            <ul class="w-1024-100 h-1024-100 m-top-1024-0">
                <li class="w-1024-100 none display-1024-block">
                    <a class="w-1024-90 p-left-1024-5 p-right-1024-5 h-1024-100 close-menu" href="javascript:void(0);" title="FECHAR">
                        <span class="table w-1024-100 h-1024-100">
                            <b class="inline f-1024-n">
                                FECHAR
                            </b>
                        </span>
                    </a>
                </li>
                <li class="w-1024-100">
                    <a class="w-1024-90 p-left-1024-5 p-right-1024-5 h-1024-100" href="{{ route('site.index') }}" title="HOME">
                        <span class="table w-1024-100 h-1024-100">
                            <b class="inline f-1024-n">
                                HOME
                            </b>
                        </span>
                    </a>
                </li>
                <li class="w-1024-100">
                    <a class="w-1024-90 p-left-1024-5 p-right-1024-5 h-1024-100" href="{{ route('site.funcionalidades') }}" title="FUNCIONALIDADES">
                        <span class="table w-1024-100 h-1024-100">
                            <b class="inline f-1024-n">
                                FUNCIONALIDADES
                            </b>
                        </span>
                    </a>
                </li>
                <li class="w-1024-100">
                    <a class="w-1024-90 p-left-1024-5 p-right-1024-5 h-1024-100" href="{{ route('site.beneficios') }}" title="BENEFÍCIOS">
                        <span class="table w-1024-100 h-1024-100">
                            <b class="inline f-1024-n">
                                BENEFÍCIOS
                            </b>
                        </span>
                    </a>
                </li>
                <li class="w-1024-100">
                    <a class="w-1024-90 p-left-1024-5 p-right-1024-5 h-1024-100" href="{{ route('site.blog') }}" title="BLOG">
                        <span class="table w-1024-100 h-1024-100">
                            <b class="inline f-1024-n">
                                BLOG
                            </b>
                        </span>
                    </a>
                </li>
                <li class="w-1024-100">
                    <a class="w-1024-90 p-left-1024-5 p-right-1024-5 h-1024-100" href="{{ route('site.contato') }}" title="CONTATO">
                        <span class="table w-1024-100 h-1024-100">
                            <b class="inline f-1024-n">
                                CONTATO
                            </b>
                        </span>
                    </a>
                </li>
                <li class="w-1024-100">
                    <a class="w-1024-90 p-left-1024-5 p-right-1024-5 h-1024-100" target="_blank" href="{{ route('register') }}" title="EXPERIMENTE GRÁTIS">
                        <span class="table w-1024-100 h-1024-100">
                            <b class="inline f-1024-n">
                                EXPERIMENTE GRÁTIS
                            </b>
                        </span>
                    </a>
                </li>
                <li class="w-1024-100">
                    <a class="w-1024-90 p-left-1024-5 p-right-1024-5 h-1024-100" target="_blank" href="{{ route('login') }}" title="ENTRAR NO SISTEMA">
                        <span class="table w-1024-100 h-1024-100">
                            <b class="inline f-1024-n">
                                ENTRAR NO SISTEMA
                            </b>
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>

@yield('content')
<footer class="def-100">
    <div class="def-100 p-top-20 p-bottom-20 bx-footer bx-green">
        <div class="def-center">
            <div class="def-80 m-left-10 w-1280-100">
                <p class="f-left m-top-10 color-white f-size-18 w-1024-100 t-align-1024-c">
                    Assine nossa newsletter e fique por dentro das novidades
                </p>
                <form class="f-right f-1024-l m-top-1024-20 relative-1024 left-1024-50 w-600-100 left-600-0" id="fNewsletter" method="post" action="">
                    {{ csrf_field() }}
                    <div class="def-100 b-radius-5 overflow-h">
                        <fieldset class="def-70">
                            <input class="def-90 p-left-5 p-right-5 border-none color-grey f-size-18" type="email" id="newsletter-email" name="email" placeholder="Digite seu e-mail" required="required" />
                        </fieldset>
                        <input class="def-30 border-none bx-green-2 f-w-600 color-white f-size-18 pointer" type="submit" id="send-newsletter" name="send-newsletter" value="Enviar" />
                    </div>
                    <div class="def-msg def-100"></div>
                </form>
            </div>
        </div>
    </div>
    <div class="def-100 bx-green-2 p-top-50 p-bottom-50">
        <div class="def-center">
            <div class="def-100 w-1024-100">
                <div class="def-35 def-text def-text-5 w-800-100">
                    <p class="f-w-600 color-green-2 f-size-2">
                        Sobre a Central Condo
                    </p>
                    <p>
                        Central Condo é a administração do seu condomínio nas suas mãos! Através de um sistema
                        100% online, projetado para facilitar o seu dia a dia, você tem as tarefas de gestão mais
                        complicadas resolvidas em poucos passos. Tudo isso em versões integradas web e aplicativos
                        mobile para sua completa comodidade.
                    </p>
                    <p>
                        Nossa capacidade de atendimento não se restringe apenas ao Brasil. A carteira de clientes de
                        nosso escritório é atendida no Brasil e no mundo, onde quer que as necessidades de nossos
                        representados estejam. O atendimento personalizado é uma de nossas marcas. Seja no contencioso
                        ou no consultivo, sempre buscamos as melhores soluções para a maximização dos resultados dos
                        nossos clientes.
                    </p>
                </div>
                <nav class="def-20 m-left-5 menu-footer w-800-100">
                    <ul class="def-48 w-600-100">
                        <li class="f-w-600 color-green-2 f-size-18">
                            Site
                        </li>
                        <li>
                            <a href="{{ route('site.index') }}" title="Home">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('site.funcionalidades') }}" title="Funcionalidades">
                                Funcionalidades
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('site.beneficios') }}" title="Benefícios">
                                Benefícios
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('site.blog') }}" title="Blog">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('site.contato') }}" title="Contato">
                                Contato
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" target="_blank" title="Experimente Gratis">
                                Experimente Gratis
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}" target="_blank"  title="Entrar no sistema">
                                Entrar no sistema
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="def-30 m-left-5 w-800-100 m-top-800-30">
                    <div class="def-100 f-w-600 color-green-2 f-size-18">
                        Contato
                    </div>
                    <p class="def-100 m-top-20 color-white f-size-3">
                        51 9987.6510
                    </p>
                    <p class="def-100 m-top-5 f-size-18">
                        <a class="color-white" href="" title="">
                            comercial@centralcondo.com.br
                        </a>
                    </p>
                    <img class="none def-100 m-top-20" src="http://localhost/centralcondo/upload/banner/main-banner.jpg">
                </div>
                <div class="def-100 m-top-60 t-align-c">
                    <a class="f-w-600 color-white f-size-16 border-white back-top click-and-scroll smooth f-1024-l w-600-100" href="topo" title="VOLTAR PARA O TOPO">VOLTAR PARA O TOPO</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="def-100 bx-green-3 p-top-20 p-bottom-20">
        <div class="def-center">
            <p class="def-100 color-white f-size-14 w-800-100 t-align-800-c t-align-c">
                Copyright 2016 - Central Condo - Todos os direitos reservados.
            </p>
        </div>
    </div>
</footer>
<!-- js -->
<script type="text/javascript" src="{{ asset('site/js/cycle.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/js/plugins/masked.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/js/plugins/scrollreveal/scrollReveal.js') }}"></script>
<script type="text/javascript">
    window.scrollReveal = new scrollReveal();
</script>
<script type="text/javascript" src="{{ asset('site/js/plugins/slick/slick.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/js/plugins/slick/scripts.js') }}"></script>
</body>
</html>