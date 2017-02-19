<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
    <title><?php echo $title." | ".$_SESSION['s3'][NOMESITE]['config']['title-site']; ?></title>
    <base href="<?php echo URLRAIZ; ?>" />

    <!-- metas -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="pt-br" />
    <meta name="author" content="http://www.agencias3.com.br" />
    <meta name="description" content="<?php echo $_SESSION['s3'][NOMESITE]['config']['description']; ?>" />
    <meta name="keywords" content="<?php echo $_SESSION['s3'][NOMESITE]['config']['keywords']; ?>" />
    <meta name="rating" content="general" />
    <meta name="distribution" content="local"/>
    <meta name="Robots" content="All"/> 
    <meta name="revisit" content="7 day" />
    <meta name="url" content="<?php echo URLRAIZ; ?>" />
    <link rel="Shortcut Icon" type="image/x-icon" href="<?php echo URLIMG; ?>favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css -->
    <link rel="stylesheet" href="<?php echo URLRAIZ; ?>/site/public/css/reset.css" type="text/css">
    <link rel="stylesheet" href="<?php echo URLRAIZ; ?>/site/public/css/estilo.css" type="text/css">
    <link rel="stylesheet" href="<?php echo URLRAIZ; ?>/site/public/css/main.css" type="text/css">
    <link rel="stylesheet" href="<?php echo URLRAIZ; ?>/site/public/css/responsive.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
        
    <script type="text/javascript" src="<?php echo URLRAIZ; ?>/site/public/js/jquery.js"></script>
    
</head>
<body class="def-100">
    <div class="def-100" id="topo"></div>
    <div class="fixed top-0 left-0 fix"></div>
    <header class="def-100 fixed z-index-9995 p-top-15 p-bottom-15<?php if($ativo != 'home'){ echo ' in-scroll page-internal'; }?>">
        <div class="def-center">
            <figure class="f-left c-left main-logo">
                <a href="" title="">
                    <img src="<?php echo URLIMG."main-logo.png"; ?>" title="" alt="" />
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
                        <a class="w-1024-90 p-left-1024-5 p-right-1024-5 h-1024-100" href="<?php echo URLRAIZ; ?>" title="HOME">
                            <span class="table w-1024-100 h-1024-100">
                                <b class="inline f-1024-n">
                                    HOME
                                </b>
                            </span>
                        </a>
                    </li>
                    <li class="w-1024-100">
                        <a class="w-1024-90 p-left-1024-5 p-right-1024-5 h-1024-100" href="<?php echo URLRAIZ."/funcionalidades"; ?>" title="FUNCIONALIDADES">
                            <span class="table w-1024-100 h-1024-100">
                                <b class="inline f-1024-n">
                                    FUNCIONALIDADES
                                </b>
                            </span>
                        </a>
                    </li>
                    <li class="w-1024-100">
                        <a class="w-1024-90 p-left-1024-5 p-right-1024-5 h-1024-100" href="<?php echo URLRAIZ."/beneficios"; ?>" title="BENEFÍCIOS">
                            <span class="table w-1024-100 h-1024-100">
                                <b class="inline f-1024-n">
                                    BENEFÍCIOS
                                </b>
                            </span>
                        </a>
                    </li>
                    <li class="w-1024-100">
                        <a class="w-1024-90 p-left-1024-5 p-right-1024-5 h-1024-100" href="<?php echo URLRAIZ."/blog"; ?>" title="BLOG">
                            <span class="table w-1024-100 h-1024-100">
                                <b class="inline f-1024-n">
                                    BLOG
                                </b>
                            </span>
                        </a>
                    </li>
                    <li class="w-1024-100">
                        <a class="w-1024-90 p-left-1024-5 p-right-1024-5 h-1024-100" href="<?php echo URLRAIZ."/contato"; ?>" title="CONTATO">
                            <span class="table w-1024-100 h-1024-100">
                                <b class="inline f-1024-n">
                                    CONTATO
                                </b>
                            </span>
                        </a>
                    </li>
                    <li class="w-1024-100">
                        <a class="w-1024-90 p-left-1024-5 p-right-1024-5 h-1024-100" href="javascript:void(0);" title="EXPERIMENTE GRÁTIS">
                            <span class="table w-1024-100 h-1024-100">
                                <b class="inline f-1024-n">
                                    EXPERIMENTE GRÁTIS
                                </b>
                            </span>
                        </a>
                    </li>
                    <li class="w-1024-100">
                        <a class="w-1024-90 p-left-1024-5 p-right-1024-5 h-1024-100" href="javascript:void(0);" title="ENTRE NO SISTEMA">
                            <span class="table w-1024-100 h-1024-100">
                                <b class="inline f-1024-n">
                                    ENTRE NO SISTEMA
                                </b>
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>